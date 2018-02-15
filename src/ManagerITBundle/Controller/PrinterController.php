<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\Printer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use ManagerITBundle\Entity\Picture;
use ManagerITBundle\Entity\Employee;
use ManagerITBundle\Entity\Document;
use ManagerITBundle\Entity\Pdf;
/**
 * Printer controller.
 *
 * @Route("printer")
 */
class PrinterController extends Controller
{
    /**
     * Lists all printer entities.
     *
     * @Route("/", name="printer_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $printers = $em->getRepository('ManagerITBundle:Printer')->findAll();

        return $this->render('printer/index.html.twig', array(
            'printers' => $printers,
        ));
    }

    /**
     * Creates a new printer entity.
     *
     * @Route("/new", name="printer_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $printer = new Printer();
        $form = $this->createForm('ManagerITBundle\Form\PrinterType', $printer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($printer);
            $em->flush($printer);

            return $this->redirectToRoute('printer_show', array('id' => $printer->getId()));
        }

        return $this->render('printer/new.html.twig', array(
            'printer' => $printer,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a printer entity.
     *
     * @Route("/{id}", name="printer_show")
     * @Method("GET")
     */
    public function showAction(Printer $printer)
    {
        $deleteForm = $this->createDeleteForm($printer);

        return $this->render('printer/show.html.twig', array(
            'printer' => $printer,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing printer entity.
     *
     * @Route("/{id}/edit", name="printer_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Printer $printer)
    {
        $deleteForm = $this->createDeleteForm($printer);
        $editForm = $this->createForm('ManagerITBundle\Form\PrinterType', $printer);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('printer_show', array('id' => $printer->getId()));
        }

        return $this->render('printer/edit.html.twig', array(
            'printer' => $printer,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a printer entity.
     *
     * @Route("/{id}", name="printer_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Printer $printer)
    {
        $form = $this->createDeleteForm($printer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($printer);
            $em->flush($printer);
        }

        return $this->redirectToRoute('printer_index');
    }

    /**
     * Creates a form to delete a printer entity.
     *
     * @param Printer $printer The printer entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Printer $printer)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('printer_delete', array('id' => $printer->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Displays a form to add photo in existing printer entity.
     *
     * @Route("/{id}/photo", name="printer_photo")
     * @Method({"GET", "POST"})
     */
    public function photoAction( Request $request, Printer $printer)
    {
        $picture = new Picture();
        $pictureForm = $this->createForm('ManagerITBundle\Form\PictureType', $picture);
        $pictureForm->handleRequest($request);

        if ($pictureForm->isSubmitted() && $pictureForm->isValid()) {

            $file = $picture->getFile();
            $fileName = $this->get('app.picture_uploader')->upload($file);

            $picture->setFile($fileName);
            $printer->addPicture($picture);
            $em = $this->getDoctrine()->getManager();
            $em->persist($picture);
            $em->flush();

            return $this->redirectToRoute('printer_photo', array('id' => $printer->getId()));
        }

        return $this->render( 'printer/photo.html.twig', array(
            'printer' => $printer,
            'picture_form' => $pictureForm->createView(),
        ));

    }

    /**
     * Action to disconnect and delete photo
     *
     * @Route("/{id}/deletepicture/{picture}", name="printer_delete_picture")
     * @Method({"GET"})
     */
    public
    function deletePictureAction(Printer $printer, Picture $picture)
    {
        $printer->removePicture($picture);

        $em = $this->getDoctrine()->getManager();
        $em->flush($printer);
        $em->remove($picture);
        $em->flush($picture);

        return $this->redirectToRoute('printer_show', array('id' => $printer->getId()));
    }

    /**
     * Finds and displays a printer employees.
     *
     * @Route("/{id}/employees", name="printer_employees")
     * @Method("GET")
     */
    public function employeesAction(Printer $printer)
    {
        $em = $this->getDoctrine()->getManager();

        $allEmployees = $em->getRepository('ManagerITBundle:Employee')->findAll();

        foreach ($allEmployees as $key => $employee) {
            if ($printer->hasEmployee($employee)) {
                unset($allEmployees[$key]);
            }
        }

        return $this->render('printer/employees.html.twig', array(
            'printer' => $printer,
            'employees' => $allEmployees,
        ));
    }

    /**
     * Action to connect printer to employee
     *
     * @Route("/{printer}/connectemployee/{employee}", name="printer_connect_employee")
     * @Method("GET")
     */
    public
    function printerConnectEmployeeAction(Request $request, Printer $printer, Employee $employee)
    {
        if (!$printer->hasEmployee($employee)) {
            $printer->addEmployee($employee);
            $employee->addPrinter($printer);
            $this->getDoctrine()->getManager()->flush();
        };


        return $this->redirectToRoute('printer_employees', array('id' => $printer->getId()));
    }

    /**
     * Printer disconnect Employee
     * @Route("/{printer}/removeemployee/{employee}", name="printer_remove_employee")
     * @Method("GET")
     */
    public
    function printerRemoveEmployeeAction(Printer $printer, Employee $employee)
    {

        $printer->removeEmployee($employee);
        $employee->removePrinter($printer);
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('printer_employees', array('id' => $printer->getId()));
    }

    /**
     * Finds and displays a printer finances.
     *
     * @Route("/{id}/finances", name="printer_finances")
     * @Method("GET")
     */
    public function financesAction(Printer $printer)
    {

        return $this->render('printer/finances.html.twig', array(
            'printer' => $printer,
        ));
    }

    /**
     * Display one of printers document.
     *
     * @Route("/{id}/document/{document}", name="printer_document_show", requirements={"document"="\d+"})
     * @Method({"GET", "POST"})
     */
    public function showDocumentAction(Request $request, Printer $printer, Document $document)
    {

        $pdf = new Pdf();
        $pdfForm = $this->createForm('ManagerITBundle\Form\PdfType', $pdf);
        $pdfForm->handleRequest($request);

        if ($pdfForm->isSubmitted() && $pdfForm->isValid()) {

            $file = $pdf->getFile();
            $fileName = $this->get('app.pdf_uploader')->upload($file);

            $pdf->setFile($fileName);
            $document->addPdf($pdf);
            $em = $this->getDoctrine()->getManager();
            $em->persist($pdf);
            $em->flush();

            return $this->redirectToRoute('printer_document_show', array('id' => $printer->getId(), 'document' => $document->getId()));

        }
        return $this->render('document/show_printer.html.twig', array(
            'printer' => $printer,
            'document' => $document,
            'pdf_form' => $pdfForm->createView()
        ));
    }

    /**
     * Action to disconnect and delete pdf
     *
     * @Route("/{printer}/document/{document}/deletepdf/{pdf}", name="document_delete_pdf_printer")
     * @Method({"GET"})
     */
    public
    function deletePdfActionPrinter(Printer $printer, Document $document, Pdf $pdf)
    {
        $document->removePdf($pdf);

        $em = $this->getDoctrine()->getManager();
        $em->flush($document);
        $em->remove($pdf);
        $em->flush($pdf);

        return $this->redirectToRoute('printer_document_show', array('id' => $printer->getId(), 'document' => $document->getId()));
    }

    /**
     * Creates a new document entity connected with printer.
     *
     * @Route("/{id}/document/new", name="printer_document_new")
     * @Method({"GET", "POST"})
     */
    public function newDocumentAction(Request $request, Printer $printer)
    {
        $document = new Document();
        $form = $this->createForm('ManagerITBundle\Form\DocumentType', $document);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $document->setPrinter($printer);
            $printer->addDocument($document);
            $em = $this->getDoctrine()->getManager();
            $em->persist($document);
            $em->flush($document);

            return $this->redirectToRoute('printer_finances', array(
                'id' => $printer->getId(),
            ));
        }

        return $this->render('document/new.html.twig', array(
            'document' => $document,
            'form' => $form->createView(),
        ));
    }

    /**
     * Edit document entity connected with printer.
     *
     * @Route("/{id}/document/{document}/edit", name="printer_document_edit")
     * @Method({"GET", "POST"})
     */
    public function editDocumentAction(Request $request, Printer $printer, Document $document)
    {
        $editForm = $this->createForm('ManagerITBundle\Form\DocumentType', $document);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('printer_finances', array(
                'id' => $printer->getId(),
            ));
        }

        return $this->render('document/edit.html.twig', array(
            'document' => $document,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Delete document entity connected with printer.
     *
     * @Route("/{id}/document/{document}/delete", name="printer_document_delete")
     * @Method({"GET", "POST"})
     */
    public function deleteDocumentAction(Request $request, Printer $printer, Document $document)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($document);
        $em->flush();

        return $this->redirectToRoute('printer_finances', array(
            'id' => $printer->getId(),
        ));
    }
}

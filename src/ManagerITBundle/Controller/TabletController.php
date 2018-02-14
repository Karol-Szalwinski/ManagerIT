<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\Tablet;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use ManagerITBundle\Entity\Picture;
use ManagerITBundle\Entity\Employee;
use ManagerITBundle\Entity\Document;
use ManagerITBundle\Entity\Pdf;

/**
 * Tablet controller.
 *
 * @Route("tablet")
 */
class TabletController extends Controller
{
    /**
     * Lists all tablet entities.
     *
     * @Route("/", name="tablet_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tablets = $em->getRepository('ManagerITBundle:Tablet')->findAll();

        return $this->render('tablet/index.html.twig', array(
            'tablets' => $tablets,
        ));
    }

    /**
     * Creates a new tablet entity.
     *
     * @Route("/new", name="tablet_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tablet = new Tablet();
        $form = $this->createForm('ManagerITBundle\Form\TabletType', $tablet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tablet);
            $em->flush($tablet);

            return $this->redirectToRoute('tablet_show', array('id' => $tablet->getId()));
        }

        return $this->render('tablet/new.html.twig', array(
            'tablet' => $tablet,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tablet entity.
     *
     * @Route("/{id}", name="tablet_show")
     * @Method("GET")
     */
    public function showAction(Tablet $tablet)
    {
        $deleteForm = $this->createDeleteForm($tablet);

        return $this->render('tablet/show.html.twig', array(
            'tablet' => $tablet,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tablet entity.
     *
     * @Route("/{id}/edit", name="tablet_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Tablet $tablet)
    {
        $deleteForm = $this->createDeleteForm($tablet);
        $editForm = $this->createForm('ManagerITBundle\Form\TabletType', $tablet);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tablet_edit', array('id' => $tablet->getId()));
        }

        return $this->render('tablet/edit.html.twig', array(
            'tablet' => $tablet,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tablet entity.
     *
     * @Route("/{id}", name="tablet_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Tablet $tablet)
    {
        $form = $this->createDeleteForm($tablet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tablet);
            $em->flush($tablet);
        }

        return $this->redirectToRoute('tablet_index');
    }

    /**
     * Creates a form to delete a tablet entity.
     *
     * @param Tablet $tablet The tablet entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Tablet $tablet)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tablet_delete', array('id' => $tablet->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Displays a form to add photo in existing tablet entity.
     *
     * @Route("/{id}/photo", name="tablet_photo")
     * @Method({"GET", "POST"})
     */
    public function photoAction( Request $request, Tablet $tablet)
    {
        $picture = new Picture();
        $pictureForm = $this->createForm('ManagerITBundle\Form\PictureType', $picture);
        $pictureForm->handleRequest($request);

        if ($pictureForm->isSubmitted() && $pictureForm->isValid()) {

            $file = $picture->getFile();
            $fileName = $this->get('app.picture_uploader')->upload($file);

            $picture->setFile($fileName);
            $tablet->addPicture($picture);
            $em = $this->getDoctrine()->getManager();
            $em->persist($picture);
            $em->flush();

            return $this->redirectToRoute('tablet_photo', array('id' => $tablet->getId()));
        }

        return $this->render( 'tablet/photo.html.twig', array(
            'tablet' => $tablet,
            'picture_form' => $pictureForm->createView(),
        ));

    }

    /**
     * Action to disconnect and delete photo
     *
     * @Route("/{id}/deletepicture/{picture}", name="tablet_delete_picture")
     * @Method({"GET"})
     */
    public
    function deletePictureAction(Tablet $tablet, Picture $picture)
    {
        $tablet->removePicture($picture);

        $em = $this->getDoctrine()->getManager();
        $em->flush($tablet);
        $em->remove($picture);
        $em->flush($picture);

        return $this->redirectToRoute('tablet_show', array('id' => $tablet->getId()));
    }

    /**
     * Finds and displays a tablet employees.
     *
     * @Route("/{id}/employees", name="tablet_employees")
     * @Method("GET")
     */
    public function employeesAction(Tablet $tablet)
    {
        $em = $this->getDoctrine()->getManager();

        $allEmployees = $em->getRepository('ManagerITBundle:Employee')->findAll();

        foreach ($allEmployees as $key => $employee) {
            if ($tablet->hasEmployee($employee)) {
                unset($allEmployees[$key]);
            }
        }

        return $this->render('tablet/employees.html.twig', array(
            'tablet' => $tablet,
            'employees' => $allEmployees,
        ));
    }

    /**
     * Action to connect tablet to employee
     *
     * @Route("/{tablet}/connectemployee/{employee}", name="tablet_connect_employee")
     * @Method("GET")
     */
    public
    function tabletConnectEmployeeAction(Request $request, Tablet $tablet, Employee $employee)
    {
        if (!$tablet->hasEmployee($employee)) {
            $tablet->addEmployee($employee);
            $employee->addTablet($tablet);
            $this->getDoctrine()->getManager()->flush();
        };


        return $this->redirectToRoute('tablet_employees', array('id' => $tablet->getId()));
    }

    /**
     * Tablet disconnect Employee
     * @Route("/{tablet}/removeemployee/{employee}", name="tablet_remove_employee")
     * @Method("GET")
     */
    public
    function tabletRemoveEmployeeAction(Tablet $tablet, Employee $employee)
    {

        $tablet->removeEmployee($employee);
        $employee->removeTablet($tablet);
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('tablet_employees', array('id' => $tablet->getId()));
    }

    /**
     * Finds and displays a tablet finances.
     *
     * @Route("/{id}/finances", name="tablet_finances")
     * @Method("GET")
     */
    public function financesAction(Tablet $tablet)
    {

        return $this->render('tablet/finances.html.twig', array(
            'tablet' => $tablet,
        ));
    }

    /**
     * Display one of tablets document.
     *
     * @Route("/{id}/document/{document}", name="tablet_document_show", requirements={"document"="\d+"})
     * @Method({"GET", "POST"})
     */
    public function showDocumentAction(Request $request, Tablet $tablet, Document $document)
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

            return $this->redirectToRoute('tablet_document_show', array('id' => $tablet->getId(), 'document' => $document->getId()));

        }
        return $this->render('document/show_tablet.html.twig', array(
            'tablet' => $tablet,
            'document' => $document,
            'pdf_form' => $pdfForm->createView()
        ));
    }

    /**
     * Action to disconnect and delete pdf
     *
     * @Route("/{tablet}/document/{document}/deletepdf/{pdf}", name="document_delete_pdf_tablet")
     * @Method({"GET"})
     */
    public
    function deletePdfActionTablet(Tablet $tablet, Document $document, Pdf $pdf)
    {
        $document->removePdf($pdf);

        $em = $this->getDoctrine()->getManager();
        $em->flush($document);
        $em->remove($pdf);
        $em->flush($pdf);

        return $this->redirectToRoute('tablet_document_show', array('id' => $tablet->getId(), 'document' => $document->getId()));
    }

    /**
     * Creates a new document entity connected with tablet.
     *
     * @Route("/{id}/document/new", name="tablet_document_new")
     * @Method({"GET", "POST"})
     */
    public function newDocumentAction(Request $request, Tablet $tablet)
    {
        $document = new Document();
        $form = $this->createForm('ManagerITBundle\Form\DocumentType', $document);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $document->setTablet($tablet);
            $tablet->addDocument($document);
            $em = $this->getDoctrine()->getManager();
            $em->persist($document);
            $em->flush($document);

            return $this->redirectToRoute('tablet_finances', array(
                'id' => $tablet->getId(),
            ));
        }

        return $this->render('document/new.html.twig', array(
            'document' => $document,
            'form' => $form->createView(),
        ));
    }

    /**
     * Edit document entity connected with tablet.
     *
     * @Route("/{id}/document/{document}/edit", name="tablet_document_edit")
     * @Method({"GET", "POST"})
     */
    public function editDocumentAction(Request $request, Tablet $tablet, Document $document)
    {
        $editForm = $this->createForm('ManagerITBundle\Form\DocumentType', $document);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tablet_finances', array(
                'id' => $tablet->getId(),
            ));
        }

        return $this->render('document/edit.html.twig', array(
            'document' => $document,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Delete document entity connected with tablet.
     *
     * @Route("/{id}/document/{document}/delete", name="tablet_document_delete")
     * @Method({"GET", "POST"})
     */
    public function deleteDocumentAction(Request $request, Tablet $tablet, Document $document)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($document);
        $em->flush();

        return $this->redirectToRoute('tablet_finances', array(
            'id' => $tablet->getId(),
        ));
    }
}

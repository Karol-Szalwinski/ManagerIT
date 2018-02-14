<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\Phone;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use ManagerITBundle\Entity\Picture;
use ManagerITBundle\Entity\Employee;
use ManagerITBundle\Entity\Document;
use ManagerITBundle\Entity\Pdf;

/**
 * Phone controller.
 *
 * @Route("phone")
 */
class PhoneController extends Controller
{
    /**
     * Lists all phone entities.
     *
     * @Route("/", name="phone_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $phones = $em->getRepository('ManagerITBundle:Phone')->findAll();

        return $this->render('phone/index.html.twig', array(
            'phones' => $phones,
        ));
    }

    /**
     * Creates a new phone entity.
     *
     * @Route("/new", name="phone_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $phone = new Phone();
        $form = $this->createForm('ManagerITBundle\Form\PhoneType', $phone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($phone);
            $em->flush($phone);

            return $this->redirectToRoute('phone_show', array('id' => $phone->getId()));
        }

        return $this->render('phone/new.html.twig', array(
            'phone' => $phone,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a phone entity.
     *
     * @Route("/{id}", name="phone_show")
     * @Method("GET")
     */
    public function showAction(Phone $phone)
    {
        $deleteForm = $this->createDeleteForm($phone);

        return $this->render('phone/show.html.twig', array(
            'phone' => $phone,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing phone entity.
     *
     * @Route("/{id}/edit", name="phone_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Phone $phone)
    {
        $deleteForm = $this->createDeleteForm($phone);
        $editForm = $this->createForm('ManagerITBundle\Form\PhoneType', $phone);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('phone_edit', array('id' => $phone->getId()));
        }

        return $this->render('phone/edit.html.twig', array(
            'phone' => $phone,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a phone entity.
     *
     * @Route("/{id}", name="phone_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Phone $phone)
    {
        $form = $this->createDeleteForm($phone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($phone);
            $em->flush($phone);
        }

        return $this->redirectToRoute('phone_index');
    }

    /**
     * Creates a form to delete a phone entity.
     *
     * @param Phone $phone The phone entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Phone $phone)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('phone_delete', array('id' => $phone->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Displays a form to add photo in existing phone entity.
     *
     * @Route("/{id}/photo", name="phone_photo")
     * @Method({"GET", "POST"})
     */
    public function photoAction( Request $request, Phone $phone)
    {
        $picture = new Picture();
        $pictureForm = $this->createForm('ManagerITBundle\Form\PictureType', $picture);
        $pictureForm->handleRequest($request);

        if ($pictureForm->isSubmitted() && $pictureForm->isValid()) {

            $file = $picture->getFile();
            $fileName = $this->get('app.picture_uploader')->upload($file);

            $picture->setFile($fileName);
            $phone->addPicture($picture);
            $em = $this->getDoctrine()->getManager();
            $em->persist($picture);
            $em->flush();

            return $this->redirectToRoute('phone_photo', array('id' => $phone->getId()));
        }

        return $this->render( 'phone/photo.html.twig', array(
            'phone' => $phone,
            'picture_form' => $pictureForm->createView(),
        ));

    }

    /**
     * Action to disconnect and delete photo
     *
     * @Route("/{id}/deletepicture/{picture}", name="phone_delete_picture")
     * @Method({"GET"})
     */
    public
    function deletePictureAction(Phone $phone, Picture $picture)
    {
        $phone->removePicture($picture);

        $em = $this->getDoctrine()->getManager();
        $em->flush($phone);
        $em->remove($picture);
        $em->flush($picture);

        return $this->redirectToRoute('phone_show', array('id' => $phone->getId()));
    }

    /**
     * Finds and displays a phone employees.
     *
     * @Route("/{id}/employees", name="phone_employees")
     * @Method("GET")
     */
    public function employeesAction(Phone $phone)
    {
        $em = $this->getDoctrine()->getManager();

        $allEmployees = $em->getRepository('ManagerITBundle:Employee')->findAll();

        foreach ($allEmployees as $key => $employee) {
            if ($phone->hasEmployee($employee)) {
                unset($allEmployees[$key]);
            }
        }

        return $this->render('phone/employees.html.twig', array(
            'phone' => $phone,
            'employees' => $allEmployees,
        ));
    }

    /**
     * Action to connect phone to employee
     *
     * @Route("/{phone}/connectemployee/{employee}", name="phone_connect_employee")
     * @Method("GET")
     */
    public
    function phoneConnectEmployeeAction(Request $request, Phone $phone, Employee $employee)
    {
        if (!$phone->hasEmployee($employee)) {
            $phone->addEmployee($employee);
            $employee->addPhone($phone);
            $this->getDoctrine()->getManager()->flush();
        };


        return $this->redirectToRoute('phone_employees', array('id' => $phone->getId()));
    }

    /**
     * Phone disconnect Employee
     * @Route("/{phone}/removeemployee/{employee}", name="phone_remove_employee")
     * @Method("GET")
     */
    public
    function phoneRemoveEmployeeAction(Phone $phone, Employee $employee)
    {

        $phone->removeEmployee($employee);
        $employee->removePhone($phone);
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('phone_employees', array('id' => $phone->getId()));
    }

    /**
     * Finds and displays a phone finances.
     *
     * @Route("/{id}/finances", name="phone_finances")
     * @Method("GET")
     */
    public function financesAction(Phone $phone)
    {

        return $this->render('phone/finances.html.twig', array(
            'phone' => $phone,
        ));
    }

    /**
     * Display one of phones document.
     *
     * @Route("/{id}/document/{document}", name="phone_document_show", requirements={"document"="\d+"})
     * @Method({"GET", "POST"})
     */
    public function showDocumentAction(Request $request, Phone $phone, Document $document)
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

            return $this->redirectToRoute('phone_document_show', array('id' => $phone->getId(), 'document' => $document->getId()));

        }
        return $this->render('document/show_phone.html.twig', array(
            'phone' => $phone,
            'document' => $document,
            'pdf_form' => $pdfForm->createView()
        ));
    }

    /**
     * Action to disconnect and delete pdf
     *
     * @Route("/{phone}/document/{document}/deletepdf/{pdf}", name="document_delete_pdf")
     * @Method({"GET"})
     */
    public
    function deletePdfAction(Phone $phone, Document $document, Pdf $pdf)
    {
        $document->removePdf($pdf);

        $em = $this->getDoctrine()->getManager();
        $em->flush($document);
        $em->remove($pdf);
        $em->flush($pdf);

        return $this->redirectToRoute('phone_document_show', array('id' => $phone->getId(), 'document' => $document->getId()));
    }

    /**
     * Creates a new document entity connected with phone.
     *
     * @Route("/{id}/document/new", name="phone_document_new")
     * @Method({"GET", "POST"})
     */
    public function newDocumentAction(Request $request, Phone $phone)
    {
        $document = new Document();
        $form = $this->createForm('ManagerITBundle\Form\DocumentType', $document);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $document->setPhone($phone);
            $phone->addDocument($document);
            $em = $this->getDoctrine()->getManager();
            $em->persist($document);
            $em->flush($document);

            return $this->redirectToRoute('phone_finances', array(
                'id' => $phone->getId(),
            ));
        }

        return $this->render('document/new.html.twig', array(
            'document' => $document,
            'form' => $form->createView(),
        ));
    }

    /**
     * Edit document entity connected with phone.
     *
     * @Route("/{id}/document/{document}/edit", name="phone_document_edit")
     * @Method({"GET", "POST"})
     */
    public function editDocumentAction(Request $request, Phone $phone, Document $document)
    {
        $editForm = $this->createForm('ManagerITBundle\Form\DocumentType', $document);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('phone_finances', array(
                'id' => $phone->getId(),
            ));
        }

        return $this->render('document/edit.html.twig', array(
            'document' => $document,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Delete document entity connected with phone.
     *
     * @Route("/{id}/document/{document}/delete", name="phone_document_delete")
     * @Method({"GET", "POST"})
     */
    public function deleteDocumentAction(Request $request, Phone $phone, Document $document)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($document);
        $em->flush();

        return $this->redirectToRoute('phone_finances', array(
            'id' => $phone->getId(),
        ));
    }
}

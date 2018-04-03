<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\Ups;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use ManagerITBundle\Entity\Picture;
use ManagerITBundle\Entity\Document;
use ManagerITBundle\Entity\Pdf;

/**
 * Up controller.
 *
 * @Route("ups")
 */
class UpsController extends Controller
{
    /**
     * Lists all up entities.
     *
     * @Route("/", name="ups_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $up = $em->getRepository('ManagerITBundle:Ups')->findAll();

        return $this->render('ups/index.html.twig', array(
            'ups' => $up,
        ));
    }

    /**
     * Creates a new up entity.
     *
     * @Route("/new", name="ups_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $up = new Ups();
        $form = $this->createForm('ManagerITBundle\Form\UpsType', $up);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($up);
            $em->flush($up);

            return $this->redirectToRoute('ups_show', array('id' => $up->getId()));
        }

        return $this->render('ups/new.html.twig', array(
            'up' => $up,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a up entity.
     *
     * @Route("/{id}", name="ups_show")
     * @Method("GET")
     */
    public function showAction(Ups $up)
    {
        $deleteForm = $this->createDeleteForm($up);

        return $this->render('ups/show.html.twig', array(
            'up' => $up,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing up entity.
     *
     * @Route("/{id}/edit", name="ups_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Ups $up)
    {
        $deleteForm = $this->createDeleteForm($up);
        $editForm = $this->createForm('ManagerITBundle\Form\UpsType', $up);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ups_show', array('id' => $up->getId()));
        }

        return $this->render('ups/edit.html.twig', array(
            'up' => $up,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a up entity.
     *
     * @Route("/{id}", name="ups_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Ups $up)
    {
        $form = $this->createDeleteForm($up);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($up);
            $em->flush($up);
        }

        return $this->redirectToRoute('ups_index');
    }

    /**
     * Creates a form to delete a up entity.
     *
     * @param Ups $up The up entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ups $up)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ups_delete', array('id' => $up->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Displays a form to add photo in existing ups entity.
     *
     * @Route("/{id}/photo", name="ups_photo")
     * @Method({"GET", "POST"})
     */
    public function photoAction( Request $request, Ups $up)
    {
        $picture = new Picture();
        $pictureForm = $this->createForm('ManagerITBundle\Form\PictureType', $picture);
        $pictureForm->handleRequest($request);

        if ($pictureForm->isSubmitted() && $pictureForm->isValid()) {

            $file = $picture->getFile();
            $fileName = $this->get('app.picture_uploader')->upload($file);

            $picture->setFile($fileName);
            $up->addPicture($picture);
            $em = $this->getDoctrine()->getManager();
            $em->persist($picture);
            $em->flush();

            return $this->redirectToRoute('ups_photo', array('id' => $up->getId()));
        }

        return $this->render( 'ups/photo.html.twig', array(
            'up' => $up,
            'picture_form' => $pictureForm->createView(),
        ));

    }

    /**
     * Action to disconnect and delete photo
     *
     * @Route("/{id}/deletepicture/{picture}", name="ups_delete_picture")
     * @Method({"GET"})
     */
    public
    function deletePictureAction(Ups $up, Picture $picture)
    {
        $up->removePicture($picture);

        $em = $this->getDoctrine()->getManager();
        $em->flush($up);
        $em->remove($picture);
        $em->flush($picture);

        return $this->redirectToRoute('ups_show', array('id' => $up->getId()));
    }

    /**
     * Finds and displays a ups finances.
     *
     * @Route("/{id}/finances", name="ups_finances")
     * @Method("GET")
     */
    public function financesAction(Ups $up)
    {

        return $this->render('ups/finances.html.twig', array(
            'up' => $up,
        ));
    }

    /**
     * Display one of upss document.
     *
     * @Route("/{id}/document/{document}", name="ups_document_show", requirements={"document"="\d+"})
     * @Method({"GET", "POST"})
     */
    public function showDocumentAction(Request $request, Ups $up, Document $document)
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

            return $this->redirectToRoute('ups_document_show', array('id' => $up->getId(), 'document' => $document->getId()));

        }
        return $this->render('document/show_ups.html.twig', array(
            'up' => $up,
            'document' => $document,
            'pdf_form' => $pdfForm->createView()
        ));
    }

    /**
     * Action to disconnect and delete pdf
     *
     * @Route("/{ups}/document/{document}/deletepdf/{pdf}", name="document_delete_pdf_ups")
     * @Method({"GET"})
     */
    public
    function deletePdfActionUps(Ups $up, Document $document, Pdf $pdf)
    {
        $document->removePdf($pdf);

        $em = $this->getDoctrine()->getManager();
        $em->flush($document);
        $em->remove($pdf);
        $em->flush($pdf);

        return $this->redirectToRoute('ups_document_show', array('id' => $up->getId(), 'document' => $document->getId()));
    }

    /**
     * Creates a new document entity connected with ups.
     *
     * @Route("/{id}/document/new", name="ups_document_new")
     * @Method({"GET", "POST"})
     */
    public function newDocumentAction(Request $request, Ups $up)
    {
        $document = new Document();
        $form = $this->createForm('ManagerITBundle\Form\DocumentType', $document);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $document->setUps($up);
            $up->addDocument($document);
            $em = $this->getDoctrine()->getManager();
            $em->persist($document);
            $em->flush($document);

            return $this->redirectToRoute('ups_finances', array(
                'id' => $up->getId(),
            ));
        }

        return $this->render('document/new.html.twig', array(
            'document' => $document,
            'form' => $form->createView(),
        ));
    }

    /**
     * Edit document entity connected with ups.
     *
     * @Route("/{id}/document/{document}/edit", name="ups_document_edit")
     * @Method({"GET", "POST"})
     */
    public function editDocumentAction(Request $request, Ups $up, Document $document)
    {
        $editForm = $this->createForm('ManagerITBundle\Form\DocumentType', $document);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ups_finances', array(
                'id' => $up->getId(),
            ));
        }

        return $this->render('document/edit.html.twig', array(
            'document' => $document,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Delete document entity connected with ups.
     *
     * @Route("/{id}/document/{document}/delete", name="ups_document_delete")
     * @Method({"GET", "POST"})
     */
    public function deleteDocumentAction(Request $request, Ups $up, Document $document)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($document);
        $em->flush();

        return $this->redirectToRoute('ups_finances', array(
            'id' => $up->getId(),
        ));
    }
}

<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\Pdf;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Pdf controller.
 *
 * @Route("pdf")
 */
class PdfController extends Controller
{
    /**
     * Lists all pdf entities.
     *
     * @Route("/", name="pdf_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pdfs = $em->getRepository('ManagerITBundle:Pdf')->findAll();

        return $this->render('pdf/index.html.twig', array(
            'pdfs' => $pdfs,
        ));
    }

    /**
     * Creates a new pdf entity.
     *
     * @Route("/new", name="pdf_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $pdf = new Pdf("test", "test");
        $form = $this->createForm('ManagerITBundle\Form\PdfType', $pdf);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pdf);
            $em->flush($pdf);

            return $this->redirectToRoute('pdf_show', array('id' => $pdf->getId()));
        }

        return $this->render('pdf/new.html.twig', array(
            'pdf' => $pdf,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a pdf entity.
     *
     * @Route("/{id}", name="pdf_show")
     * @Method("GET")
     */
    public function showAction(Pdf $pdf)
    {
        $deleteForm = $this->createDeleteForm($pdf);

        return $this->render('pdf/show.html.twig', array(
            'pdf' => $pdf,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing pdf entity.
     *
     * @Route("/{id}/edit", name="pdf_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Pdf $pdf)
    {
        $deleteForm = $this->createDeleteForm($pdf);
        $editForm = $this->createForm('ManagerITBundle\Form\PdfType', $pdf);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pdf_edit', array('id' => $pdf->getId()));
        }

        return $this->render('pdf/edit.html.twig', array(
            'pdf' => $pdf,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a pdf entity.
     *
     * @Route("/{id}", name="pdf_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Pdf $pdf)
    {
        $form = $this->createDeleteForm($pdf);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pdf);
            $em->flush($pdf);
        }

        return $this->redirectToRoute('pdf_index');
    }

    /**
     * Creates a form to delete a pdf entity.
     *
     * @param Pdf $pdf The pdf entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Pdf $pdf)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pdf_delete', array('id' => $pdf->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

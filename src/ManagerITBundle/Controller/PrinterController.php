<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\Printer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

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

            return $this->redirectToRoute('printer_edit', array('id' => $printer->getId()));
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
}

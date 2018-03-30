<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\Ups;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

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

        $ups = $em->getRepository('ManagerITBundle:Ups')->findAll();

        return $this->render('ups/index.html.twig', array(
            'ups' => $ups,
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

            return $this->redirectToRoute('ups_edit', array('id' => $up->getId()));
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
}

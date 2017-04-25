<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\desktopRam;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Desktopram controller.
 *
 * @Route("desktopram")
 */
class desktopRamController extends Controller
{
    /**
     * Lists all desktopRam entities.
     *
     * @Route("/", name="desktopram_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $desktopRams = $em->getRepository('ManagerITBundle:desktopRam')->findAll();

        return $this->render('desktopram/index.html.twig', array(
            'desktopRams' => $desktopRams,
        ));
    }

    /**
     * Creates a new desktopRam entity.
     *
     * @Route("/new", name="desktopram_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $desktopRam = new Desktopram();
        $form = $this->createForm('ManagerITBundle\Form\desktopRamType', $desktopRam);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($desktopRam);
            $em->flush($desktopRam);

            return $this->redirectToRoute('desktopram_show', array('id' => $desktopRam->getId()));
        }

        return $this->render('desktopram/new.html.twig', array(
            'desktopRam' => $desktopRam,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a desktopRam entity.
     *
     * @Route("/{id}", name="desktopram_show")
     * @Method("GET")
     */
    public function showAction(desktopRam $desktopRam)
    {
        $deleteForm = $this->createDeleteForm($desktopRam);

        return $this->render('desktopram/show.html.twig', array(
            'desktopRam' => $desktopRam,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing desktopRam entity.
     *
     * @Route("/{id}/edit", name="desktopram_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, desktopRam $desktopRam)
    {
        $deleteForm = $this->createDeleteForm($desktopRam);
        $editForm = $this->createForm('ManagerITBundle\Form\desktopRamType', $desktopRam);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('desktopram_edit', array('id' => $desktopRam->getId()));
        }

        return $this->render('desktopram/edit.html.twig', array(
            'desktopRam' => $desktopRam,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a desktopRam entity.
     *
     * @Route("/{id}", name="desktopram_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, desktopRam $desktopRam)
    {
        $form = $this->createDeleteForm($desktopRam);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($desktopRam);
            $em->flush($desktopRam);
        }

        return $this->redirectToRoute('desktopram_index');
    }

    /**
     * Creates a form to delete a desktopRam entity.
     *
     * @param desktopRam $desktopRam The desktopRam entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(desktopRam $desktopRam)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('desktopram_delete', array('id' => $desktopRam->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\OpticalDrive;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Opticaldrive controller.
 *
 * @Route("opticaldrive")
 */
class OpticalDriveController extends Controller
{
    /**
     * Lists all opticalDrive entities.
     *
     * @Route("/", name="opticaldrive_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $opticalDrives = $em->getRepository('ManagerITBundle:OpticalDrive')->findAll();

        return $this->render('opticaldrive/index.html.twig', array(
            'opticalDrives' => $opticalDrives,
        ));
    }

    /**
     * Creates a new opticalDrive entity.
     *
     * @Route("/new/{desktop}", name="opticaldrive_new")
     * @Method({"GET", "POST"})
     */
    public function newAction($desktop, Request $request)
    {
        $opticalDrive = new Opticaldrive();
        $form = $this->createForm('ManagerITBundle\Form\OpticalDriveType', $opticalDrive);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($opticalDrive);
            $em->flush($opticalDrive);
            $route = ($desktop == null) ? $this->redirectToRoute('opticaldrive_show', array('id' => $opticalDrive->getId())) :
                $this->redirectToRoute('desktop_components', array('id' => $desktop));
            return $route;
        }

        return $this->render('opticaldrive/new.html.twig', array(
            'opticalDrive' => $opticalDrive,
            'form' => $form->createView(),
            'desktop' => $desktop,
        ));
    }

    /**
     * Finds and displays a opticalDrive entity.
     *
     * @Route("/{id}", name="opticaldrive_show")
     * @Method("GET")
     */
    public function showAction(OpticalDrive $opticalDrive)
    {
        $deleteForm = $this->createDeleteForm($opticalDrive);

        return $this->render('opticaldrive/show.html.twig', array(
            'opticalDrive' => $opticalDrive,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing opticalDrive entity.
     *
     * @Route("/{id}/edit", name="opticaldrive_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, OpticalDrive $opticalDrive)
    {
        $deleteForm = $this->createDeleteForm($opticalDrive);
        $editForm = $this->createForm('ManagerITBundle\Form\OpticalDriveType', $opticalDrive);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('opticaldrive_edit', array('id' => $opticalDrive->getId()));
        }

        return $this->render('opticaldrive/edit.html.twig', array(
            'opticalDrive' => $opticalDrive,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a opticalDrive entity.
     *
     * @Route("/{id}", name="opticaldrive_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, OpticalDrive $opticalDrive)
    {
        $form = $this->createDeleteForm($opticalDrive);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($opticalDrive);
            $em->flush($opticalDrive);
        }

        return $this->redirectToRoute('opticaldrive_index');
    }

    /**
     * Creates a form to delete a opticalDrive entity.
     *
     * @param OpticalDrive $opticalDrive The opticalDrive entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(OpticalDrive $opticalDrive)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('opticaldrive_delete', array('id' => $opticalDrive->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

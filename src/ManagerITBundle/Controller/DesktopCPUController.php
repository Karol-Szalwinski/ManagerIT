<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\DesktopCPU;
use ManagerITBundle\Entity\Desktop;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Desktopcpu controller.
 *
 * @Route("desktopcpu")
 */
class DesktopCPUController extends Controller
{
    /**
     * Lists all desktopCPU entities.
     *
     * @Route("/", name="desktopcpu_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $desktopCPUs = $em->getRepository('ManagerITBundle:DesktopCPU')->findAll();

        return $this->render('desktopcpu/index.html.twig', array(
            'desktopCPUs' => $desktopCPUs,
        ));
    }

    /**
     * Creates a new desktopCPU entity.
     *
     * @Route("/new/{computer}", name="desktopcpu_new", defaults={"computer" = null})
     * @Method({"GET", "POST"})
     */
    public function newAction( $computer, Request $request)
    {
        $desktopCPU = new Desktopcpu();
        $form = $this->createForm('ManagerITBundle\Form\DesktopCPUType', $desktopCPU);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($desktopCPU);
            $em->flush($desktopCPU);
            if ($computer != null) {
                $computerToReturn = $em->getRepository('ManagerITBundle:Computer')->findOneById($computer);
                if ($computerToReturn) {
                    $type = $computerToReturn->getFormFactor();
                    return $this->redirectToRoute('computer_components', array('type' => $type, 'id' => $computer));
                }
            }

            return $this->redirectToRoute('desktopcpu_show', array('id' => $desktopCPU->getId()));
        }

        return $this->render('desktopcpu/new.html.twig', array(
            'desktopCPU' => $desktopCPU,
            'form' => $form->createView(),
            'computer' => $computer,
        ));
    }

    /**
     * Finds and displays a desktopCPU entity.
     *
     * @Route("/{id}", name="desktopcpu_show")
     * @Method("GET")
     */
    public function showAction(DesktopCPU $desktopCPU)
    {
        $deleteForm = $this->createDeleteForm($desktopCPU);

        return $this->render('desktopcpu/show.html.twig', array(
            'desktopCPU' => $desktopCPU,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing desktopCPU entity.
     *
     * @Route("/{id}/edit", name="desktopcpu_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DesktopCPU $desktopCPU)
    {
        $deleteForm = $this->createDeleteForm($desktopCPU);
        $editForm = $this->createForm('ManagerITBundle\Form\DesktopCPUType', $desktopCPU);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('desktopcpu_edit', array('id' => $desktopCPU->getId()));
        }

        return $this->render('desktopcpu/edit.html.twig', array(
            'desktopCPU' => $desktopCPU,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a desktopCPU entity.
     *
     * @Route("/{id}", name="desktopcpu_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DesktopCPU $desktopCPU)
    {
        $form = $this->createDeleteForm($desktopCPU);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($desktopCPU);
            $em->flush($desktopCPU);
        }

        return $this->redirectToRoute('desktopcpu_index');
    }

    /**
     * Creates a form to delete a desktopCPU entity.
     *
     * @param DesktopCPU $desktopCPU The desktopCPU entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DesktopCPU $desktopCPU)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('desktopcpu_delete', array('id' => $desktopCPU->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}

<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\InstalledApplication;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Installedapplication controller.
 *
 * @Route("install")
 */
class InstalledApplicationController extends Controller
{
    /**
     * Lists all installedApplication entities.
     *
     * @Route("/", name="install_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $installedApplications = $em->getRepository('ManagerITBundle:InstalledApplication')->findAll();

        return $this->render('installedapplication/index.html.twig', array(
            'installedApplications' => $installedApplications,
        ));
    }

    /**
     * Creates a new installedApplication entity.
     *
     * @Route("/new", name="install_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $installedApplication = new Installedapplication();
        $form = $this->createForm('ManagerITBundle\Form\InstalledApplicationType', $installedApplication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($installedApplication);
            $em->flush($installedApplication);

            return $this->redirectToRoute('install_show', array('id' => $installedApplication->getId()));
        }

        return $this->render('installedapplication/new.html.twig', array(
            'installedApplication' => $installedApplication,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a installedApplication entity.
     *
     * @Route("/{id}", name="install_show")
     * @Method("GET")
     */
    public function showAction(InstalledApplication $installedApplication)
    {
        $deleteForm = $this->createDeleteForm($installedApplication);

        return $this->render('installedapplication/show.html.twig', array(
            'installedApplication' => $installedApplication,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing installedApplication entity.
     *
     * @Route("/{id}/edit", name="install_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, InstalledApplication $installedApplication)
    {
        $deleteForm = $this->createDeleteForm($installedApplication);
        $editForm = $this->createForm('ManagerITBundle\Form\InstalledApplicationType', $installedApplication);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('install_edit', array('id' => $installedApplication->getId()));
        }

        return $this->render('installedapplication/edit.html.twig', array(
            'installedApplication' => $installedApplication,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a installedApplication entity.
     *
     * @Route("/{id}", name="install_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, InstalledApplication $installedApplication)
    {
        $form = $this->createDeleteForm($installedApplication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($installedApplication);
            $em->flush($installedApplication);
        }

        return $this->redirectToRoute('install_index');
    }

    /**
     * Creates a form to delete a installedApplication entity.
     *
     * @param InstalledApplication $installedApplication The installedApplication entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(InstalledApplication $installedApplication)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('install_delete', array('id' => $installedApplication->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

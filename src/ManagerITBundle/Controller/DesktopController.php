<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\Desktop;
use ManagerITBundle\Entity\Employee;
use ManagerITBundle\Entity\License;
use ManagerITBundle\FileUploader;
use Symfony\Component\HttpFoundation\File\File;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Desktop controller.
 *
 * @Route("desktop")
 */
class DesktopController extends Controller
{
    /**
     * Lists all desktop entities.
     *
     * @Route("/", name="desktop_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $desktops = $em->getRepository('ManagerITBundle:Desktop')->findAll();

        return $this->render('desktop/index.html.twig', array(
            'desktops' => $desktops,
        ));
    }

    /**
     * Creates a new desktop entity.
     *
     * @Route("/new", name="desktop_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $desktop = new Desktop();
        $form = $this->createForm('ManagerITBundle\Form\DesktopType', $desktop);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $desktop->getPicture();
            $fileName = $this->get('app.picture_uploader')->upload($file);

            $desktop->setPicture($fileName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($desktop);
            $em->flush($desktop);

            return $this->redirectToRoute('desktop_show', array('id' => $desktop->getId()));
        }

        return $this->render('desktop/new.html.twig', array(
            'desktop' => $desktop,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a desktop entity.
     *
     * @Route("/{id}", name="desktop_show")
     * @Method("GET")
     */
    public function showAction(Desktop $desktop)
    {
        $deleteForm = $this->createDeleteForm($desktop);
        $licenseForm = $this->createForm('ManagerITBundle\Form\DesktopConnectLicenseType', $desktop);
        $employeeForm = $this->createForm('ManagerITBundle\Form\DesktopConnectEmployeeType', $desktop);

        return $this->render('desktop/show.html.twig', array(
            'desktop' => $desktop,
            'delete_form' => $deleteForm->createView(),
            'license_form' => $licenseForm->createView(),
            'employee_form' => $employeeForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing desktop entity.
     *
     * @Route("/{id}/edit", name="desktop_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Desktop $desktop)
    {
        //Zmieniamy wartość pola Picture ze stringa na obiekt pliku
        if ($desktop->getPicture() != null) {
            $desktop->setPicture(
                new File($this->getParameter('pictures_directory') . '/' . $desktop->getPicture())
            );
        }
        $deleteForm = $this->createDeleteForm($desktop);
        $editForm = $this->createForm('ManagerITBundle\Form\DesktopType', $desktop);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $file = $desktop->getPicture();
            $fileName = $this->get('app.picture_uploader')->upload($file);

            $desktop->setPicture($fileName);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('desktop_edit', array('id' => $desktop->getId()));
        }

        return $this->render('desktop/edit.html.twig', array(
            'desktop' => $desktop,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a desktop entity.
     *
     * @Route("/{id}", name="desktop_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Desktop $desktop)
    {
        $form = $this->createDeleteForm($desktop);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($desktop);
            $em->flush($desktop);
        }

        return $this->redirectToRoute('desktop_index');
    }

    /**
     * Creates a form to delete a desktop entity.
     *
     * @param Desktop $desktop The desktop entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Desktop $desktop)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('desktop_delete', array('id' => $desktop->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    /**
     *
     * @Route("/{id}/desktoptoemployee}", name="desktop_connect_employee")
     * @Method("POST")
     */
    public function desktopConnectEmployeeAction(Request $request, Desktop $desktop)
    {

        $form = $this->createForm('ManagerITBundle\Form\DesktopConnectEmployeeType', $desktop);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $desktop = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($desktop);
            $em->flush();
        }

        return $this->redirectToRoute('desktop_show', array('id' => $desktop->getId()));
    }

    /**
     * Action to connect desktop with license
     *
     * @Route("/{id}/desktoptolicense", name="desktop_connect_license")
     * @Method("POST")
     */
    public function desktopConnectLicenseAction(Request $request, Desktop $desktop)
    {

        $form = $this->createForm('ManagerITBundle\Form\DesktopConnectLicenseType', $desktop);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $desktop = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($desktop);
            $em->flush();

        }

        return $this->redirectToRoute('desktop_show', array('id' => $desktop->getId()));
    }

    /**
     * Action to disconnect desktop with license
     *
     * @Route("/{id}/detach_license/{license}", name="desktop_detach_license")
     * @Method({"GET"})
     */
    public function detachLicenseAction(Desktop $desktop, License $license)
    {
        $desktop->removeLicense($license);
        $license->removeDesktop($desktop);
        $em = $this->getDoctrine()->getManager();
        $em->flush($desktop);
        $em->flush($license);

        return $this->redirectToRoute('desktop_show', array('id' => $desktop->getId()));
    }

    /**
     * Action to disconnect desktop with employee
     *
     * @Route("/{id}/detach_employee/{employee}", name="desktop_detach_employee")
     * @Method({"GET"})
     */
    public function detachEmployeeAction(Desktop $desktop, Employee $employee)
    {
        $desktop->removeEmployee($employee);
        $employee->removeDesktop($desktop);
        $em = $this->getDoctrine()->getManager();
        $em->flush($desktop);
        $em->flush($employee);

        return $this->redirectToRoute('desktop_show', array('id' => $desktop->getId()));
    }


}

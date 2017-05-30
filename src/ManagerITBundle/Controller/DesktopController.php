<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\Desktop;
use ManagerITBundle\Entity\DesktopCPU;
use ManagerITBundle\Entity\DesktopRam;
use ManagerITBundle\Entity\Employee;
use ManagerITBundle\Entity\License;
use ManagerITBundle\Entity\Picture;
use ManagerITBundle\Entity\RamSlot;
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
        $validator = $this->get('validator');

        $desktop = new Desktop();
        $form = $this->createForm('ManagerITBundle\Form\DesktopType', $desktop);
        $form->handleRequest($request);
        $errors = $validator->validate($desktop);
        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($desktop);
            $em->flush($desktop);

            return $this->redirectToRoute('desktop_show', array('id' => $desktop->getId()));
        }

        return $this->render('desktop/new.html.twig', array(
            'desktop' => $desktop,
            'form' => $form->createView(),
            'errors' => $errors,
        ));
    }

    /**
     * Finds and displays a desktop components.
     *
     * @Route("/{id}/components", name="desktop_components")
     * @Method("GET")
     */
    public function componentsAction(Desktop $desktop)
    {
        $em = $this->getDoctrine()->getManager();

        $desktopCPUs = $em->getRepository('ManagerITBundle:DesktopCPU')->findAll();
        $desktopRams = $em->getRepository('ManagerITBundle:DesktopRam')->findAll();
        return $this->render('desktop/components.html.twig', array(
            'desktop' => $desktop,
            'desktopCPUs' => $desktopCPUs,
            'desktopRams' => $desktopRams,
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

        $deleteForm = $this->createDeleteForm($desktop);
        $editForm = $this->createForm('ManagerITBundle\Form\DesktopType', $desktop);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('desktop_show', array('id' => $desktop->getId()));
        }

        return $this->render('desktop/edit.html.twig', array(
            'desktop' => $desktop,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));

    }

    /**
     * Displays a form to edit photo in existing desktop entity.
     *
     * @Route("/{id}/photo", name="desktop_photo")
     * @Method({"GET", "POST"})
     */
    public function photoAction(Request $request, Desktop $desktop)
    {
        $picture = new Picture();
        $pictureForm = $this->createForm('ManagerITBundle\Form\PictureType', $picture);
        $pictureForm->handleRequest($request);

        if ($pictureForm->isSubmitted() && $pictureForm->isValid()) {

            $file = $picture->getFile();
            $fileName = $this->get('app.picture_uploader')->upload($file);

            $picture->setFile($fileName);
            $desktop->addPicture($picture);
            $em = $this->getDoctrine()->getManager();
            $em->persist($picture);
            $em->flush();

            return $this->redirectToRoute('desktop_show', array('id' => $desktop->getId()));
        }

        return $this->render('desktop/photo.html.twig', array(
            'desktop' => $desktop,
            'picture_form' => $pictureForm->createView(),
        ));

    }

    /**
     * Action to disconnect and delete photo
     *
     * @Route("/{id}/deletepicture/{picture}", name="desktop_delete_picture")
     * @Method({"GET"})
     */
    public
    function deletePictureAction(Desktop $desktop, Picture $picture)
    {
        $desktop->removePicture($picture);

        $em = $this->getDoctrine()->getManager();
        $em->flush($desktop);
        $em->remove($picture);
        $em->flush($picture);


        return $this->redirectToRoute('desktop_show', array('id' => $desktop->getId()));
    }

    /**
     * Deletes a desktop entity.
     *
     * @Route("/{id}", name="desktop_delete")
     * @Method("DELETE")
     */
    public
    function deleteAction(Request $request, Desktop $desktop)
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
    private
    function createDeleteForm(Desktop $desktop)
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
    public
    function desktopConnectEmployeeAction(Request $request, Desktop $desktop)
    {

        $form = $this->createForm('ManagerITBundle\Form\DesktopConnectEmployeeType', $desktop);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
        }

        return $this->redirectToRoute('desktop_show', array('id' => $desktop->getId()));
    }

    /**
     * Action to connect desktop with license
     *
     * @Route("/{id}/desktoptolicense", name="desktop_connect_license")
     * @Method("POST")
     */
    public
    function desktopConnectLicenseAction(Request $request, Desktop $desktop)
    {

        $form = $this->createForm('ManagerITBundle\Form\DesktopConnectLicenseType', $desktop);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
        }

        return $this->redirectToRoute('desktop_show', array('id' => $desktop->getId()));
    }

    /**
     * Action to disconnect desktop with license
     *
     * @Route("/{id}/detach_license/{license}", name="desktop_detach_license")
     * @Method({"GET"})
     */
    public
    function detachLicenseAction(Desktop $desktop, License $license)
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
    public
    function detachEmployeeAction(Desktop $desktop, Employee $employee)
    {
        $desktop->removeEmployee($employee);
        $employee->removeDesktop($desktop);
        $em = $this->getDoctrine()->getManager();
        $em->flush($desktop);
        $em->flush($employee);

        return $this->redirectToRoute('desktop_show', array('id' => $desktop->getId()));
    }

    /**
     *
     * @Route("/{id}/desktop_connect_cpu/{desktopCpu}", name="desktop_connect_cpu")
     * @Method("GET")
     */
    public
    function desktopConnectCpuAction(Desktop $desktop, DesktopCPU $desktopCpu)
    {
        $desktop->setCpu($desktopCpu);
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('desktop_components', array('id' => $desktop->getId()));
    }

    /**
     *
     * @Route("/{id}/desktop_connect_rams/{ram}", name="desktop_connect_ram")
     * @Method("GET")
     */
    public
    function desktopConnectRamsAction(Desktop $desktop, DesktopRam $ram)
    {

        $ramSlot = new RamSlot();
        $ramSlot->setRam($ram);
        $ramSlot->setDesktop($desktop);
        $desktop->addRamslot($ramSlot);

        $em = $this->getDoctrine()->getManager();
        $em->persist($ramSlot);
        $em->flush();

        return $this->redirectToRoute('desktop_components', array('id' => $desktop->getId()));
    }
    /**
     * Desktop disconnect ram
     * @Route("/{id}/desktop_remove_ram/{ramslot}", name="desktop_remove_ram")
     * @Method("GET")
     */
    public
    function desktopRemoveRamAction(Desktop $desktop, RamSlot $ramslot)
    {

        $desktop->removeRamslot($ramslot);

        $em = $this->getDoctrine()->getManager();
        $em->remove($ramslot);
        $em->flush();

        return $this->redirectToRoute('desktop_components', array('id' => $desktop->getId()));
    }
}

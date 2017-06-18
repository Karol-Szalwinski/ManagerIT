<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\Computer;
use ManagerITBundle\Entity\DesktopCPU;
use ManagerITBundle\Entity\DesktopRam;
use ManagerITBundle\Entity\Employee;
use ManagerITBundle\Entity\Licese;
use ManagerITBundle\Entity\InterfacePci;
use ManagerITBundle\Entity\License;
use ManagerITBundle\Entity\Picture;
use ManagerITBundle\Entity\RamSlot;
use ManagerITBundle\Entity\Gpu;
use ManagerITBundle\Entity\StorageController;
use ManagerITBundle\Entity\Hdd;
use ManagerITBundle\Entity\Ssd;
use ManagerITBundle\Entity\OpticalDrive;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Computer controller.
 *
 * @Route("computer")
 */
class ComputerController extends Controller
{
    /**
     * Lists all computer entities.
     *
     * @Route("/", name="computer_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $computers = $em->getRepository('ManagerITBundle:Computer')->findAll();

        return $this->render('computer/index.html.twig', array(
            'computers' => $computers,
        ));
    }

    /**
     * Lists specific entities type.
     *
     * @Route("/{type}", name="computer_type_index")
     * @Method("GET")
     */
    public function computerTypeIndexAction($type)
    {
        $em = $this->getDoctrine()->getManager();

        $computers = $em->getRepository('ManagerITBundle:Computer')->findByFormFactor($type);

        return $this->render('computer/index.html.twig', array(
            'computers' => $computers,
        ));
    }


    /**
     * Creates a new computer entity.
     *
     * @Route("/{type}/new", name="computer_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $type)
    {
        $computer = new Computer();
        $typeForm = ($type == 'desktop') ? 'ManagerITBundle\Form\DesktopType': 'ManagerITBundle\Form\LaptopType'  ;
        $form = $this->createForm($typeForm, $computer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $computer->setFormFactor($type);
            $em = $this->getDoctrine()->getManager();
            $em->persist($computer);
            $em->flush($computer);

            return $this->redirectToRoute('computer_show', array('type' => $type, 'id' => $computer->getId()));
        }

        return $this->render($type .'/new.html.twig', array(
            'computer' => $computer,
            'form' => $form->createView(),
            'type' => $type,
        ));
    }

    /**
     * Finds and displays a computer entity.
     *
     * @Route("/{type}/{id}", name="computer_show")
     * @Method("GET")
     */
    public function showAction($type, Computer $computer)
    {
        $deleteForm = $this->createDeleteForm($computer);

        return $this->render($type .'/show.html.twig', array(
            'computer' => $computer,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing computer entity.
     *
     * @Route("/{type}/{id}/edit", name="computer_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, $type, Computer $computer)
    {
        $deleteForm = $this->createDeleteForm($computer);
        $typeForm = ($type == 'desktop') ? 'ManagerITBundle\Form\DesktopType': 'ManagerITBundle\Form\LaptopType'  ;
        $editForm = $this->createForm($typeForm, $computer);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('computer_show', array('type' => $type,'id' => $computer->getId()));
        }

        return $this->render($type .'/edit.html.twig', array(
            'computer' => $computer,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a computer entity.
     *
     * @Route("/{id}", name="computer_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Computer $computer)
    {
        $form = $this->createDeleteForm($computer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($computer);
            $em->flush($computer);
        }

        return $this->redirectToRoute('computer_index');
    }

    /**
     * Creates a form to delete a computer entity.
     *
     * @param Computer $computer The computer entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Computer $computer)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('computer_delete', array('id' => $computer->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


    /**
     * Finds and displays a computer components.
     *
     * @Route("/{type}/{id}/components", name="computer_components")
     * @Method("GET")
     */
    public function componentsAction($type, Computer $computer)
    {
        $em = $this->getDoctrine()->getManager();

        $desktopCPUs = $em->getRepository('ManagerITBundle:DesktopCPU')->findAll();
        $desktopRams = $em->getRepository('ManagerITBundle:DesktopRam')->findAll();
        $gpus = $em->getRepository('ManagerITBundle:Gpu')->findAll();
        $hdds = $em->getRepository('ManagerITBundle:Hdd')->findAll();
        $ssds = $em->getRepository('ManagerITBundle:Ssd')->findAll();
        $opticalDrives = $em->getRepository('ManagerITBundle:OpticalDrive')->findAll();

        return $this->render($type . '/components.html.twig', array(
            'computer' => $computer,
            'desktopCPUs' => $desktopCPUs,
            'desktopRams' => $desktopRams,
            'gpus' => $gpus,
            'hdds' => $hdds,
            'ssds' => $ssds,
            'opticalDrives' => $opticalDrives,
        ));
    }

    /**
     *
     * @Route("/{type}/{id}/computer_connect_cpu/{desktopCpu}", name="computer_connect_cpu")
     * @Method("GET")
     */
    public
    function computerConnectCpuAction($type, Computer $computer, DesktopCPU $desktopCpu)
    {
        $computer->setCpu($desktopCpu);
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('computer_components', array('type' => $type,'id' => $computer->getId()));
    }

    /**
     *
     * @Route("/{type}/{id}/computer_connect_rams/{ram}", name="computer_connect_ram")
     * @Method("GET")
     */
    public
    function computerConnectRamsAction($type, Computer $computer, DesktopRam $ram)
    {

        $ramSlot = new RamSlot();
        $ramSlot->setRam($ram);
        $ramSlot->setComputer($computer);
        $computer->addRamslot($ramSlot);

        $em = $this->getDoctrine()->getManager();
        $em->persist($ramSlot);
        $em->flush();

        return $this->redirectToRoute('computer_components', array('type' => $type,'id' => $computer->getId()));
    }
    /**
     * Computer disconnect ram
     * @Route("/{type}/{id}/computer_remove_ram/{ramslot}", name="computer_remove_ram")
     * @Method("GET")
     */
    public
    function computerRemoveRamAction($type, Computer $computer, RamSlot $ramslot)
    {

        $computer->removeRamslot($ramslot);

        $em = $this->getDoctrine()->getManager();
        $em->remove($ramslot);
        $em->flush();

        return $this->redirectToRoute('computer_components', array('type' => $type,'id' => $computer->getId()));
    }
    /**
     *
     * @Route("/{type}/{id}/computer_connect_gpu/{gpu}", name="computer_connect_gpu")
     * @Method("GET")
     */
    public
    function computerConnectGpuAction($type, Computer $computer, Gpu $gpu)
    {

        $interfacePci = new InterfacePci();
        $interfacePci->setCardGpu($gpu);
        $interfacePci->setComputer($computer);
        $computer->addPciInterface($interfacePci);

        $em = $this->getDoctrine()->getManager();
        $em->persist($interfacePci);
        $em->flush();

        return $this->redirectToRoute('computer_components', array('type' => $type,'id' => $computer->getId()));
    }
    /**
     * Computer remove gpu
     * @Route("/{type}/{id}/computer_remove_gpu/{interfacePci}", name="computer_remove_gpu")
     * @Method("GET")
     */
    public
    function computerRemoveGpuAction($type, Computer $computer, InterfacePci $interfacePci)
    {

        $computer->removePciInterface($interfacePci);

        $em = $this->getDoctrine()->getManager();
        $em->remove($interfacePci);
        $em->flush();

        return $this->redirectToRoute('computer_components', array('type' => $type,'id' => $computer->getId()));
    }
    /**
     * Computer connect hdd
     * @Route("/{type}/{id}/computer_connect_hdd/{hdd}", name="computer_connect_hdd")
     * @Method("GET")
     */
    public
    function computerConnectHddAction($type, Computer $computer, Hdd $hdd)
    {

        $storageController = new StorageController();
        $storageController->setHdd($hdd);
        $storageController->setComputer($computer);
        $computer->addStorageController($storageController);

        $em = $this->getDoctrine()->getManager();
        $em->persist($storageController);
        $em->flush();

        return $this->redirectToRoute('computer_components', array('type' => $type,'id' => $computer->getId()));
    }
    /**
     * Computer remove hdd
     * @Route("/{type}/{id}/computer_remove_hdd/{storageController}", name="computer_remove_hdd")
     * @Method("GET")
     */
    public
    function computerRemoveHddAction($type, Computer $computer, StorageController $storageController)
    {

        $computer->removeStorageController($storageController);

        $em = $this->getDoctrine()->getManager();
        $em->remove($storageController);
        $em->flush();

        return $this->redirectToRoute('computer_components', array('type' => $type,'id' => $computer->getId()));
    }
    /**
     * Computer connect ssd
     * @Route("/{type}/{id}/computer_connect_ssd/{ssd}", name="computer_connect_ssd")
     * @Method("GET")
     */
    public
    function computerConnectSsdAction($type, Computer $computer, Ssd $ssd)
    {

        $storageController = new StorageController();
        $storageController->setSsd($ssd);
        $storageController->setComputer($computer);
        $computer->addStorageController($storageController);

        $em = $this->getDoctrine()->getManager();
        $em->persist($storageController);
        $em->flush();

        return $this->redirectToRoute('computer_components', array('type' => $type,'id' => $computer->getId()));
    }
    /**
     * Computer remove ssd
     * @Route("/{type}/{id}/computer_remove_ssd/{storageController}", name="computer_remove_ssd")
     * @Method("GET")
     */
    public
    function computerRemoveSsdAction($type, Computer $computer, StorageController $storageController)
    {

        $computer->removeStorageController($storageController);

        $em = $this->getDoctrine()->getManager();
        $em->remove($storageController);
        $em->flush();

        return $this->redirectToRoute('computer_components', array('type' => $type,'id' => $computer->getId()));
    }

    /**
     * Computer connect optical drive
     * @Route("/{type}/{id}/computer_connect_drive/{opticalDrive}", name="computer_connect_drive")
     * @Method("GET")
     */
    public
    function computerConnectDriveAction($type, Computer $computer, OpticalDrive $opticalDrive)
    {

        $storageController = new StorageController();
        $storageController->setOpticalDrive($opticalDrive);
        $storageController->setComputer($computer);
        $computer->addStorageController($storageController);

        $em = $this->getDoctrine()->getManager();
        $em->persist($storageController);
        $em->flush();

        return $this->redirectToRoute('computer_components', array('type' => $type,'id' => $computer->getId()));
    }
    /**
     * Computer remove optical drive
     * @Route("/{type}/{id}/computer_remove_drive/{storageController}", name="computer_remove_drive")
     * @Method("GET")
     */
    public
    function computerRemoveDriveAction($type, Computer $computer, StorageController $storageController)
    {

        $computer->removeStorageController($storageController);

        $em = $this->getDoctrine()->getManager();
        $em->remove($storageController);
        $em->flush();

        return $this->redirectToRoute('computer_components', array('type' => $type,'id' => $computer->getId()));
    }

    /**
     * Displays a form to edit photo in existing computer entity.
     *
     * @Route("/{type}/{id}/photo", name="computer_photo")
     * @Method({"GET", "POST"})
     */
    public function photoAction($type, Request $request, Computer $computer)
    {
        $picture = new Picture();
        $pictureForm = $this->createForm('ManagerITBundle\Form\PictureType', $picture);
        $pictureForm->handleRequest($request);

        if ($pictureForm->isSubmitted() && $pictureForm->isValid()) {

            $file = $picture->getFile();
            $fileName = $this->get('app.picture_uploader')->upload($file);

            $picture->setFile($fileName);
            $computer->addPicture($picture);
            $em = $this->getDoctrine()->getManager();
            $em->persist($picture);
            $em->flush();

            return $this->redirectToRoute('computer_show', array('type' => $type, 'id' => $computer->getId()));
        }

        return $this->render($type . '/photo.html.twig', array(
            'computer' => $computer,
            'picture_form' => $pictureForm->createView(),
        ));

    }

    /**
     * Action to disconnect and delete photo
     *
     * @Route("/{type}/{id}/deletepicture/{picture}", name="computer_delete_picture")
     * @Method({"GET"})
     */
    public
    function deletePictureAction($type, Computer $computer, Picture $picture)
    {
        $computer->removePicture($picture);

        $em = $this->getDoctrine()->getManager();
        $em->flush($computer);
        $em->remove($picture);
        $em->flush($picture);

        return $this->redirectToRoute('computer_show', array('type' => $type, 'id' => $computer->getId()));
    }

    /**
     * Finds and displays a computer employees.
     *
     * @Route("/{type}/{id}/employees", name="computer_employees")
     * @Method("GET")
     */
    public function employeesAction($type, Computer $computer)
    {
        $em = $this->getDoctrine()->getManager();

        $employees = $em->getRepository('ManagerITBundle:Employee')->findAll();

        return $this->render($type . '/employees.html.twig', array(
            'computer' => $computer,
            'employees' => $employees,
        ));
    }

    /**
     * Action to connect computer to employee
     *
     * @Route("/{computer}/connectemployee/{employee}", name="computer_connect_employee")
     * @Method("GET")
     */
    public
    function computerConnectEmployeeAction(Request $request, Computer $computer, Employee $employee)
    {
        if(!$computer->hasEmployee($employee)) {
            $computer->addEmployee($employee);
            $employee->addComputer($computer);
            $this->getDoctrine()->getManager()->flush();
        };

        $type = $computer->getFormFactor();

        return $this->redirectToRoute('computer_employees', array('type' => $type,'id' => $computer->getId()));
    }

    /**
     * Computer disconnect Employee
     * @Route("/{computer}/removeemployee/{employee}", name="computer_remove_employee")
     * @Method("GET")
     */
    public
    function computerRemoveEmployeeAction(Computer $computer, Employee $employee)
    {

        $computer->removeEmployee($employee);
        $employee->removeComputer($computer);
        $this->getDoctrine()->getManager()->flush();

        $type = $computer->getFormFactor();

        return $this->redirectToRoute('computer_employees', array('type' => $type,'id' => $computer->getId()));
    }

    /**
     * Finds and displays a computer licenses.
     *
     * @Route("/{type}/{id}/license", name="computer_licenses")
     * @Method("GET")
     */
    public function licensesAction($type, Computer $computer)
    {
        $em = $this->getDoctrine()->getManager();

        $licenses = $em->getRepository('ManagerITBundle:License')->findAll();

        return $this->render($type . '/licenses.html.twig', array(
            'computer' => $computer,
            'licenses' => $licenses,
        ));
    }

    /**
     * Action to connect computer to license
     *
     * @Route("/{computer}/connectlicense/{license}", name="computer_connect_license")
     * @Method("GET")
     */
    public
    function computerConnectLicenseAction(Request $request, Computer $computer, License $license)
    {

        $computer->addLicense($license);
        $license->addComputer($computer);
        $this->getDoctrine()->getManager()->flush();

        $type = $computer->getFormFactor();

        return $this->redirectToRoute('computer_licenses', array('type' => $type,'id' => $computer->getId()));
    }

    /**
     * Computer disconnect License
     * @Route("/{computer}/removelicense/{license}", name="computer_remove_license")
     * @Method("GET")
     */
    public
    function computerRemoveLicenseAction(Computer $computer, License $license)
    {

        $computer->removeLicense($license);
        $license->removeComputer($computer);
        $this->getDoctrine()->getManager()->flush();

        $type = $computer->getFormFactor();

        return $this->redirectToRoute('computer_licenses', array('type' => $type,'id' => $computer->getId()));
    }
}

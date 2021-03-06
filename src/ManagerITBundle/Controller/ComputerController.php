<?php

namespace ManagerITBundle\Controller;

use Doctrine\DBAL\Types\StringType;
use ManagerITBundle\Entity\Computer;
use ManagerITBundle\Entity\DesktopCPU;
use ManagerITBundle\Entity\DesktopRam;
use ManagerITBundle\Entity\User;
use ManagerITBundle\Entity\InstalledApplication;
use ManagerITBundle\Entity\License;
use ManagerITBundle\Entity\Application;
use ManagerITBundle\Entity\InterfacePci;
use ManagerITBundle\Entity\Picture;
use ManagerITBundle\Entity\PowerSupply;
use ManagerITBundle\Entity\RamSlot;
use ManagerITBundle\Entity\Gpu;
use ManagerITBundle\Entity\StorageController;
use ManagerITBundle\Entity\Hdd;
use ManagerITBundle\Entity\Ssd;
use ManagerITBundle\Entity\OpticalDrive;
use ManagerITBundle\Entity\NetworkInterfaceCard;
use ManagerITBundle\Entity\Document;
use ManagerITBundle\Entity\Pdf;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

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
        $typeForm = ($type == 'desktop') ? 'ManagerITBundle\Form\DesktopType' : 'ManagerITBundle\Form\LaptopType';
        $form = $this->createForm($typeForm, $computer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $computer->setFormFactor($type);
            $em = $this->getDoctrine()->getManager();
            $em->persist($computer);
            $em->flush($computer);

            return $this->redirectToRoute('computer_show', array('type' => $type, 'id' => $computer->getId()));
        }

        return $this->render($type . '/new.html.twig', array(
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

        return $this->render($type . '/show.html.twig', array(
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
        $typeForm = ($type == 'desktop') ? 'ManagerITBundle\Form\DesktopType' : 'ManagerITBundle\Form\LaptopType';
        $editForm = $this->createForm($typeForm, $computer);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('computer_show', array('type' => $type, 'id' => $computer->getId()));
        }

        return $this->render($type . '/edit.html.twig', array(
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
            ->getForm();
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
        $powerSupplies = $em->getRepository('ManagerITBundle:PowerSupply')->findAll();

        return $this->render($type . '/components.html.twig', array(
            'computer' => $computer,
            'desktopCPUs' => $desktopCPUs,
            'desktopRams' => $desktopRams,
            'gpus' => $gpus,
            'hdds' => $hdds,
            'ssds' => $ssds,
            'opticalDrives' => $opticalDrives,
            'powerSupplies' => $powerSupplies,
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

        return $this->redirectToRoute('computer_components', array('type' => $type, 'id' => $computer->getId()));
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

        return $this->redirectToRoute('computer_components', array('type' => $type, 'id' => $computer->getId()));
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

        return $this->redirectToRoute('computer_components', array('type' => $type, 'id' => $computer->getId()));
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

        return $this->redirectToRoute('computer_components', array('type' => $type, 'id' => $computer->getId()));
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

        return $this->redirectToRoute('computer_components', array('type' => $type, 'id' => $computer->getId()));
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

        return $this->redirectToRoute('computer_components', array('type' => $type, 'id' => $computer->getId()));
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

        return $this->redirectToRoute('computer_components', array('type' => $type, 'id' => $computer->getId()));
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

        return $this->redirectToRoute('computer_components', array('type' => $type, 'id' => $computer->getId()));
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

        return $this->redirectToRoute('computer_components', array('type' => $type, 'id' => $computer->getId()));
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

        return $this->redirectToRoute('computer_components', array('type' => $type, 'id' => $computer->getId()));
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

        return $this->redirectToRoute('computer_components', array('type' => $type, 'id' => $computer->getId()));
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

            return $this->redirectToRoute('computer_photo', array('type' => $type, 'id' => $computer->getId()));
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
     * Finds and displays a computer users.
     *
     * @Route("/{type}/{id}/users", name="computer_users")
     * @Method("GET")
     */
    public function usersAction($type, Computer $computer)
    {
        $em = $this->getDoctrine()->getManager();

        $allUsers = $em->getRepository('ManagerITBundle:User')->findAll();

        foreach ($allUsers as $key => $user) {
            if ($computer->hasUser($user)) {
                unset($allUsers[$key]);
            }
        }

        return $this->render($type . '/users.html.twig', array(
            'computer' => $computer,
            'users' => $allUsers,
        ));
    }

    /**
     * Action to connect computer to user
     *
     * @Route("/{computer}/connectuser/{user}", name="computer_connect_user")
     * @Method("GET")
     */
    public
    function computerConnectUserAction(Request $request, Computer $computer, User $user)
    {
        if (!$computer->hasUser($user)) {
            $computer->addUser($user);
            $user->addComputer($computer);
            $this->getDoctrine()->getManager()->flush();
        };

        $type = $computer->getFormFactor();

        return $this->redirectToRoute('computer_users', array('type' => $type, 'id' => $computer->getId()));
    }

    /**
     * Computer disconnect User
     * @Route("/{computer}/removeuser/{user}", name="computer_remove_user")
     * @Method("GET")
     */
    public
    function computerRemoveUserAction(Computer $computer, User $user)
    {

        $computer->removeUser($user);
        $user->removeComputer($computer);
        $this->getDoctrine()->getManager()->flush();

        $type = $computer->getFormFactor();

        return $this->redirectToRoute('computer_users', array('type' => $type, 'id' => $computer->getId()));
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

        $allLicenses = $em->getRepository('ManagerITBundle:License')->findAll();

        foreach ($allLicenses as $key => $license) {
            if ($computer->hasLicense($license)) {
                unset($allLicenses[$key]);
            }
        }

        return $this->render($type . '/licenses.html.twig', array(
            'computer' => $computer,
            'licenses' => $allLicenses,
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
        if (!$computer->hasLicense($license)) {
            $computer->addLicense($license);
            $license->addComputer($computer);
            $this->getDoctrine()->getManager()->flush();
            $this->getDoctrine()->getManager()->flush();
        };

        $type = $computer->getFormFactor();

        return $this->redirectToRoute('computer_licenses', array('type' => $type, 'id' => $computer->getId()));
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

        return $this->redirectToRoute('computer_licenses', array('type' => $type, 'id' => $computer->getId()));
    }

    /**
     * Finds and displays a computer installed aplication.
     *
     * @Route("/{type}/{id}/applications/{installed}", name="computer_applications", defaults={"installed" = null})
     * @Method("GET")
     */
    public function applicationsAction($type, Computer $computer, $installed)
    {
        $em = $this->getDoctrine()->getManager();

        $allInstalledApplications = $em->getRepository('ManagerITBundle:InstalledApplication')->findAll();
        $allApplications = $em->getRepository('ManagerITBundle:Application')->findAll();

        foreach ($allInstalledApplications as $key => $installedApplication) {
            if ($computer->hasInstalledApplication($installedApplication)) {
                unset($allInstalledApplications[$key]);
            }
        }

        $matchedLicenses =  null;
        $modalStatus = 'hide';
        if($installed != null) {
            $installedApplication = $em->getRepository('ManagerITBundle:InstalledApplication')->findOneById($installed);
            if($installedApplication instanceof InstalledApplication) {
                $application = $installedApplication->getApplication();
                if($application instanceof Application) {
                    $matchedLicenses = $application->getLicenses();
                    $modalStatus = 'show';
                }
            }
        }


        return $this->render($type . '/applications.html.twig', array(
            'computer' => $computer,
            'installedApplications' => $allInstalledApplications,
            'applications' => $allApplications,
            'licenses' => $matchedLicenses,
            'installed' => $installed,
            'modalStatus' => $modalStatus

        ));
    }

    /**
     * Action to install application
     *
     * @Route("/{computer}/installaplication/{application}", name="computer_install_application")
     * @Method("GET")
     */
    public
    function computerInstallApplicationAction(Request $request, Computer $computer, Application $application)
    {
        $installedApplication = New InstalledApplication();
        $installedApplication->setApplication($application);
        $installedApplication->setComputer($computer);

        $computer->addInstalledApplication($installedApplication);

        $em = $this->getDoctrine()->getManager();
        $em->persist($installedApplication);
        $em->flush($installedApplication);


        $type = $computer->getFormFactor();

        return $this->redirectToRoute('computer_applications', array('type' => $type, 'id' => $computer->getId()));
    }

    /**
     * Computer uninstall application
     * @Route("/{computer}/uninstall/{installedApplication}", name="computer_uninstall_application")
     * @Method("GET")
     */
    public
    function computerUninstallApplicationAction(Computer $computer, InstalledApplication $installedApplication)
    {

        $computer->removeInstalledApplication($installedApplication);
        $installedApplication->removeComputer($computer);
        $em = $this->getDoctrine()->getManager();
        $em->remove($installedApplication);

        $em->flush();

        $type = $computer->getFormFactor();

        return $this->redirectToRoute('computer_applications', array('type' => $type, 'id' => $computer->getId()));
    }

    /**
     * Action to install application
     *
     * @Route("/{computer}/application/{installed}/connect/{license}", name="computer_installed_application_connect_license")
     * @Method("GET")
     */
    public
    function computerInstalledApplicationConnectLicenseAction(Request $request, Computer $computer, $installed, License $license)
    {
//        var_export($installed); die();
        $em = $this->getDoctrine()->getManager();

        $installedApplication =  $em->getRepository('ManagerITBundle:InstalledApplication')->findOneById($installed);

        $installedApplication->setLicense($license);
        $license->addInstalledApplication($installedApplication);

        $em->flush();

        $type = $computer->getFormFactor();

        return $this->redirectToRoute('computer_applications', array('type' => $type, 'id' => $computer->getId()));
    }

    /**
     * Finds and displays a computer components.
     *
     * @Route("/{type}/{id}/network", name="computer_network")
     * @Method("GET")
     */
    public function networkAction($type, Computer $computer)
    {

        return $this->render($type . '/network.html.twig', array(
            'computer' => $computer,

        ));
    }

    /**
     * Creates a new networkInterfaceCard entity connected with computer.
     *
     * @Route("/{type}/{id}/network/new", name="computer_network_new")
     * @Method({"GET", "POST"})
     */
    public function newNetworkAction(Request $request, $type, Computer $computer)
    {
        $networkInterfaceCard = new Networkinterfacecard();
        $form = $this->createForm('ManagerITBundle\Form\NetworkInterfaceCardType', $networkInterfaceCard);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $networkInterfaceCard->setDevice($computer);
            $computer->addNetworkInterfaceCard($networkInterfaceCard);
            $em = $this->getDoctrine()->getManager();
            $em->persist($networkInterfaceCard);
            $em->flush($networkInterfaceCard);

            return $this->redirectToRoute('computer_network', array(
                'type' => $type,
                'id' => $computer->getId(),
            ));
        }

        return $this->render('networkinterfacecard/new.html.twig', array(
            'networkInterfaceCard' => $networkInterfaceCard,
            'form' => $form->createView(),
        ));
    }

    /**
     * Edit networkInterfaceCard entity connected with computer.
     *
     * @Route("/{type}/{id}/network/{networkInterfaceCard}/edit", name="computer_network_edit")
     * @Method({"GET", "POST"})
     */
    public function editNetworkAction(Request $request, $type, Computer $computer, NetworkInterfaceCard $networkInterfaceCard)
    {
        $editForm = $this->createForm('ManagerITBundle\Form\NetworkInterfaceCardType', $networkInterfaceCard);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('computer_network', array(
                'type' => $type,
                'id' => $computer->getId(),
            ));
        }

        return $this->render('networkinterfacecard/edit.html.twig', array(
            'networkInterfaceCard' => $networkInterfaceCard,
            'edit_form' => $editForm->createView(),
            'type' => $type,
        ));
    }

    /**
     * Edit networkInterfaceCard entity connected with computer.
     *
     * @Route("/{type}/{id}/network/{networkInterfaceCard}/delete", name="computer_network_delete")
     * @Method({"GET", "POST"})
     */
    public function deleteNetworkAction(Request $request, $type, Computer $computer, NetworkInterfaceCard $networkInterfaceCard)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($networkInterfaceCard);
        $em->flush();

        return $this->redirectToRoute('computer_network', array(
            'type' => $type,
            'id' => $computer->getId(),
        ));
    }

    /**
     *
     * @Route("/{type}/{id}/computer_connect_power_supply/{powerSupply}", name="computer_connect_powersupply")
     * @Method("GET")
     */
    public
    function computerConnectPowerSupplyAction($type, Computer $computer, PowerSupply $powerSupply)
    {
        $computer->setPowerSupply($powerSupply);
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('computer_components', array('type' => $type, 'id' => $computer->getId()));
    }

    /**
     * Finds and displays a computer finances.
     *
     * @Route("/{type}/{id}/finances", name="computer_finances")
     * @Method("GET")
     */
    public function financesAction($type, Computer $computer)
    {

        return $this->render($type . '/finances.html.twig', array(
            'computer' => $computer,
        ));
    }

    /**
     * Display one of computers document.
     *
     * @Route("/{type}/{id}/document/{document}", name="computer_document_show", requirements={"document"="\d+"})
     * @Method({"GET", "POST"})
     */
    public function showDocumentAction(Request $request, $type, Computer $computer, Document $document)
    {

        $pdf = new Pdf();
        $pdfForm = $this->createForm('ManagerITBundle\Form\PdfType', $pdf);
        $pdfForm->handleRequest($request);

        if ($pdfForm->isSubmitted() && $pdfForm->isValid()) {

            $file = $pdf->getFile();
            $fileName = $this->get('app.pdf_uploader')->upload($file);

            $pdf->setFile($fileName);
            $document->addPdf($pdf);
            $em = $this->getDoctrine()->getManager();
            $em->persist($pdf);
            $em->flush();

            return $this->redirectToRoute('computer_document_show', array('type' => $type, 'id' => $computer->getId(), 'document' => $document->getId()));

        }
        return $this->render('document/show.html.twig', array(
            'computer' => $computer,
            'document' => $document,
            'pdf_form' => $pdfForm->createView(),
            'type' => $type,
        ));
    }

    /**
     * Action to disconnect and delete pdf
     *
     * @Route("/{type}/{computer}/document/{document}/deletepdf/{pdf}", name="document_delete_pdf")
     * @Method({"GET"})
     */
    public
    function deletePdfAction($type, Computer $computer, Document $document, Pdf $pdf)
    {
        $document->removePdf($pdf);

        $em = $this->getDoctrine()->getManager();
        $em->flush($document);
        $em->remove($pdf);
        $em->flush($pdf);

        return $this->redirectToRoute('computer_document_show', array('type' => $type, 'id' => $computer->getId(), 'document' => $document->getId()));
    }

    /**
     * Creates a new document entity connected with computer.
     *
     * @Route("/{type}/{id}/document/new", name="computer_document_new")
     * @Method({"GET", "POST"})
     */
    public function newDocumentAction(Request $request, $type, Computer $computer)
    {
        $document = new Document();
        $form = $this->createForm('ManagerITBundle\Form\DocumentType', $document);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $document->setComputer($computer);
            $computer->addDocument($document);
            $em = $this->getDoctrine()->getManager();
            $em->persist($document);
            $em->flush($document);

            return $this->redirectToRoute('computer_finances', array(
                'type' => $type,
                'id' => $computer->getId(),
            ));
        }

        return $this->render('document/new.html.twig', array(
            'document' => $document,
            'form' => $form->createView(),
        ));
    }

    /**
     * Edit document entity connected with computer.
     *
     * @Route("/{type}/{id}/document/{document}/edit", name="computer_document_edit")
     * @Method({"GET", "POST"})
     */
    public function editDocumentAction(Request $request, $type, Computer $computer, Document $document)
    {
        $editForm = $this->createForm('ManagerITBundle\Form\DocumentType', $document);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('computer_finances', array(
                'type' => $type,
                'id' => $computer->getId(),
            ));
        }

        return $this->render('document/edit.html.twig', array(
            'document' => $document,
            'edit_form' => $editForm->createView(),
            'type' => $type,
        ));
    }

    /**
     * Delete document entity connected with computer.
     *
     * @Route("/{type}/{id}/document/{document}/delete", name="computer_document_delete")
     * @Method({"GET", "POST"})
     */
    public function deleteDocumentAction(Request $request, $type, Computer $computer, Document $document)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($document);
        $em->flush();

        return $this->redirectToRoute('computer_finances', array(
            'type' => $type,
            'id' => $computer->getId(),
        ));
    }


}

<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\ConfigFile;
use ManagerITBundle\Entity\NetworkDevice;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use ManagerITBundle\Entity\Picture;
use ManagerITBundle\Entity\Password;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Networkdevice controller.
 *
 * @Route("networkdevice")
 */
class NetworkDeviceController extends Controller
{
    /**
     * Lists all networkDevice entities.
     *
     * @Route("/", name="networkdevice_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $networkDevices = $em->getRepository('ManagerITBundle:NetworkDevice')->findAll();

        return $this->render('networkdevice/index.html.twig', array(
            'networkDevices' => $networkDevices,
        ));
    }

    /**
     * Creates a new networkDevice entity.
     *
     * @Route("/new", name="networkdevice_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $networkDevice = new Networkdevice();
        $form = $this->createForm('ManagerITBundle\Form\NetworkDeviceType', $networkDevice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($networkDevice);
            $em->flush($networkDevice);

            return $this->redirectToRoute('networkdevice_show', array('id' => $networkDevice->getId()));
        }

        return $this->render('networkdevice/new.html.twig', array(
            'networkDevice' => $networkDevice,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a networkDevice entity.
     *
     * @Route("/{id}", name="networkdevice_show")
     * @Method({"GET", "POST"})
     */
    public function showAction(Request $request, NetworkDevice $networkDevice)
    {
        $deleteForm = $this->createDeleteForm($networkDevice);

        $configFile = new ConfigFile();
        $configForm = $this->createForm('ManagerITBundle\Form\ConfigFileType', $configFile);
        $configForm->handleRequest($request);

        if ($configForm->isSubmitted() && $configForm->isValid()) {

            $file = $configFile->getFile();

            $fileName = $this->get('app.file_uploader')->upload($file);

            $configFile->setFile($fileName);

            $networkDevice->addConfigFile($configFile);
            $em = $this->getDoctrine()->getManager();
            $em->persist($configFile);
            $em->flush();

            return $this->redirectToRoute('networkdevice_show', array('id' => $networkDevice->getId()));
        }

        return $this->render( 'networkdevice/show.html.twig', array(
            'networkDevice' => $networkDevice,
            'config_form' => $configForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing networkDevice entity.
     *
     * @Route("/{id}/edit", name="networkdevice_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, NetworkDevice $networkDevice)
    {
        $deleteForm = $this->createDeleteForm($networkDevice);
        $editForm = $this->createForm('ManagerITBundle\Form\NetworkDeviceType', $networkDevice);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('networkdevice_show', array('id' => $networkDevice->getId()));
        }

        return $this->render('networkdevice/edit.html.twig', array(
            'networkDevice' => $networkDevice,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a networkDevice entity.
     *
     * @Route("/{id}", name="networkdevice_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, NetworkDevice $networkDevice)
    {
        $form = $this->createDeleteForm($networkDevice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($networkDevice);
            $em->flush($networkDevice);
        }

        return $this->redirectToRoute('networkdevice_index');
    }

    /**
     * Creates a form to delete a networkDevice entity.
     *
     * @param NetworkDevice $networkDevice The networkDevice entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(NetworkDevice $networkDevice)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('networkdevice_delete', array('id' => $networkDevice->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Displays a form to add photo in existing network device entity.
     *
     * @Route("/{id}/photo", name="networkdevice_photo")
     * @Method({"GET", "POST"})
     */
    public function photoAction( Request $request, NetworkDevice $networkDevice)
    {
        $picture = new Picture();
        $pictureForm = $this->createForm('ManagerITBundle\Form\PictureType', $picture);
        $pictureForm->handleRequest($request);

        if ($pictureForm->isSubmitted() && $pictureForm->isValid()) {

            $file = $picture->getFile();
            $fileName = $this->get('app.picture_uploader')->upload($file);

            $picture->setFile($fileName);
            $networkDevice->addPicture($picture);
            $em = $this->getDoctrine()->getManager();
            $em->persist($picture);
            $em->flush();

            return $this->redirectToRoute('networkdevice_photo', array('id' => $networkDevice->getId()));
        }

        return $this->render( 'networkdevice/photo.html.twig', array(
            'networkDevice' => $networkDevice,
            'picture_form' => $pictureForm->createView(),
        ));

    }

    /**
     * Action to disconnect and delete photo
     *
     * @Route("/{id}/deletepicture/{picture}", name="network_device_delete_picture")
     * @Method({"GET"})
     */
    public
    function deletePictureAction(NetworkDevice $networkDevice, Picture $picture)
    {
        $networkDevice->removePicture($picture);

        $em = $this->getDoctrine()->getManager();
        $em->flush($networkDevice);
        $em->remove($picture);
        $em->flush($picture);

        return $this->redirectToRoute('networkdevice_show', array('id' => $networkDevice->getId()));
    }


    /**
     * Displays a form to add config file in existing network device entity.
     *
     * @Route("/{id}/config", name="networkdevice_config")
     * @Method({"GET", "POST"})
     */
    public function configAction( Request $request, NetworkDevice $networkDevice)
    {
        $configFile = new ConfigFile();
        $configForm = $this->createForm('ManagerITBundle\Form\ConfigFileType', $configFile);
        $configForm->handleRequest($request);

        if ($configForm->isSubmitted() && $configForm->isValid()) {

            $file = $configFile->getFile();
            $fileName = $this->get('app.picture_uploader')->upload($file);

            $configFile->setFile($fileName);
            $networkDevice->addConfigFile($configFile);
            $em = $this->getDoctrine()->getManager();
            $em->persist($configFile);
            $em->flush();

            return $this->redirectToRoute('networkdevice_show', array('id' => $networkDevice->getId()));
        }

        return $this->render( 'networkdevice/show.html.twig', array(
            'networkDevice' => $networkDevice,
            'config_form' => $configForm->createView(),
        ));

    }

    /**
     * Finds and displays a network device passwords.
     *
     * @Route("/{id}/passwords", name="network_device_password")
     * @Method("GET")
     */
    public function passwordsAction(NetworkDevice $networkDevice)
    {

        return $this->render('networkdevice/passwords.html.twig', array(
            'networkDevice' => $networkDevice,
        ));
    }

    /**
     * Display one of network device password.
     *
     * @Route("/{id}/passwords/{password}", name="network_device_password_show", requirements={"password"="\d+"})
     * @Method({"GET", "POST"})
     */
    public function showPasswordAction(Request $request, NetworkDevice $networkDevice, Password $password)
    {

//        $pdf = new Pdf();
//        $pdfForm = $this->createForm('ManagerITBundle\Form\PdfType', $pdf);
//        $pdfForm->handleRequest($request);
//
//        if ($pdfForm->isSubmitted() && $pdfForm->isValid()) {
//
//            $file = $pdf->getFile();
//            $fileName = $this->get('app.pdf_uploader')->upload($file);
//
//            $pdf->setFile($fileName);
//            $document->addPdf($pdf);
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($pdf);
//            $em->flush();
//
//            return $this->redirectToRoute('tablet_document_show', array('id' => $tablet->getId(), 'document' => $document->getId()));
//
//        }
        return $this->render('password/show_network_device.html.twig', array(
            'networkDevice' => $networkDevice,
            'password' => $password
//            'pdf_form' => $pdfForm->createView()
        ));
    }



    /**
     * Creates a new password entity connected with network device.
     *
     * @Route("/{id}/password/new", name="network_device_password_new")
     * @Method({"GET", "POST"})
     */
    public function newPasswordAction(Request $request, NetworkDevice $networkDevice)
    {
        $password = new Password();
        $form = $this->createForm('ManagerITBundle\Form\PassType', $password);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $plainPassword = $password->getPassword();
            $encodedPassword = str_rot13(base64_encode($plainPassword));

            $password->setPassword($encodedPassword);


            $password->setNetworkDevice($networkDevice);
            $networkDevice->addPassword($password);
            $em = $this->getDoctrine()->getManager();
            $em->persist($password);
            $em->flush($password);

            return $this->redirectToRoute('network_device_password', array(
                'id' => $networkDevice->getId(),
            ));
        }

        return $this->render('password/new.html.twig', array(
            'password' => $networkDevice,
            'form' => $form->createView(),
        ));
    }

    /**
     * Edit password entity connected with network device.
     *
     * @Route("/{id}/password/{password}/edit", name="network_device_password_edit")
     * @Method({"GET", "POST"})
     */
    public function editPasswordAction(Request $request, NetworkDevice $networkDevice, Password $password)
    {
        $editForm = $this->createForm('ManagerITBundle\Form\PassType', $password);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('network_device_password', array(
                'id' => $networkDevice->getId(),
            ));
        }

        return $this->render('password/edit.html.twig', array(
            'password' => $password,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Delete password entity connected with network device.
     *
     * @Route("/{id}/password/{password}/delete", name="network_device_password_delete")
     * @Method({"GET", "POST"})
     */
    public function deletePasswordAction(Request $request, NetworkDevice $networkDevice, Password $password)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($password);
        $em->flush();

        return $this->redirectToRoute('network_device_password', array(
            'id' => $networkDevice->getId(),
        ));
    }



}

<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\NetworkDevice;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use ManagerITBundle\Entity\Picture;

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
     * @Method("GET")
     */
    public function showAction(NetworkDevice $networkDevice)
    {
        $deleteForm = $this->createDeleteForm($networkDevice);

        return $this->render('networkdevice/show.html.twig', array(
            'networkDevice' => $networkDevice,
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
}

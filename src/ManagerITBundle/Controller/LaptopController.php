<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\Laptop;
use ManagerITBundle\Entity\Employee;
use ManagerITBundle\Entity\License;
use ManagerITBundle\Repository\LicenseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

/**
 * Laptop controller.
 *
 * @Route("laptop")
 */
class LaptopController extends Controller {

    /**
     * Test
     *
     * @Route("/test", name="test")
     * @Method("GET")
     */
    public function testAction($kurde) {

        return $this->render('laptop/test.html.twig', ['kurde' => $kurde]);
    }

    /**
     * Lists all laptop entities.
     *
     * @Route("/", name="laptop_index")
     * @Method("GET")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $laptops = $em->getRepository('ManagerITBundle:Laptop')->findAll();

        return $this->render('laptop/index.html.twig', array(
                    'laptops' => $laptops,
        ));
    }

    /**
     * Creates a new laptop entity.
     *
     * @Route("/new", name="laptop_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request) {
        $laptop = new Laptop();
        $form = $this->createForm('ManagerITBundle\Form\LaptopType', $laptop);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($laptop);
            $em->flush($laptop);

            return $this->redirectToRoute('laptop_show', array('id' => $laptop->getId()));
        }

        return $this->render('laptop/new.html.twig', array(
                    'laptop' => $laptop,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a laptop entity.
     *
     * @Route("/{id}", name="laptop_show")
     * @Method({"GET"})
     */
    public function showAction(Laptop $laptop) {
        $deleteForm = $this->createDeleteForm($laptop);
        $licenseForm = $this->createLaptopConnectLicenseForm($laptop);

        return $this->render('laptop/show.html.twig', array(
                    'laptop' => $laptop,
                    'delete_form' => $deleteForm->createView(),
                    'license_form' => $licenseForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing laptop entity.
     *
     * @Route("/{id}/edit", name="laptop_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Laptop $laptop) {
        $deleteForm = $this->createDeleteForm($laptop);
        $editForm = $this->createForm('ManagerITBundle\Form\LaptopType', $laptop);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('laptop_edit', array('id' => $laptop->getId()));
        }

        return $this->render('laptop/edit.html.twig', array(
                    'laptop' => $laptop,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a laptop entity.
     *
     * @Route("/{id}", name="laptop_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Laptop $laptop) {
        $form = $this->createDeleteForm($laptop);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($laptop);
            $em->flush($laptop);
        }

        return $this->redirectToRoute('laptop_index');
    }

    /**
     * Creates a form to delete a laptop entity.
     *
     * @param Laptop $laptop The laptop entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Laptop $laptop) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('laptop_delete', array('id' => $laptop->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

    /**
     * Deletes a laptop entity.
     *
     * @Route("/{id}", name="laptop_connect_license")
     * @Method("POST")
     */
    public function laptopConnectLicenseAction(Request $request, Laptop $laptop) {
        $form = $this->createLaptopConnectLicenseForm($laptop);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $licensesToConnect = $form->getData()['licenses'];
            $licensesToConnect->addLaptop($laptop);
            $laptop->addLicense($licensesToConnect);

            $this->getDoctrine()->getManager()->flush();
        }

        return $this->redirectToRoute('laptop_show', array('id' => $laptop->getId()));
    }

    /**
     * Creates a form to connect laptop and license
     *
     * @param Laptop $laptop The laptop entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createLaptopConnectLicenseForm(Laptop $laptop) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('laptop_connect_license', array('id' => $laptop->getId())))
                        ->add('licenses', 'entity', [
                            'class' => 'ManagerITBundle:License',
                            'choice_label' => "name",
                            'query_builder' => function (LicenseRepository $er) use ($laptop) {
                                return $er->findAllDisconnect();
                            },
                        ])
                        ->getForm()
        ;
    }

    /**
     * Action to disconnect laptop with employee
     * 
     *  @Route("/{id}/detach_employee/{employee}", name="laptop_detach_employee")
     *  @Method({"GET"})
     */
    public function detachEmployeeAction(Laptop $laptop, Employee $employee) {
        $laptop->removeEmployee($employee);
        $employee->removeLaptop($laptop);

        $em = $this->getDoctrine()->getManager();
        $em->flush($laptop);
        $em->flush($employee);

        return $this->redirectToRoute('laptop_show', array('id' => $laptop->getId()));
    }

    /**
     * Action to disconnect laptop with license
     * 
     *  @Route("/{id}/detach_license/{license}", name="laptop_detach_license")
     *  @Method({"GET"})
     */
    public function detachLicenseAction(Laptop $laptop, License $license) {
        $laptop->removeLicense($license);
        $license->removeLaptop($laptop);

        $em = $this->getDoctrine()->getManager();
        $em->flush($laptop);
        $em->flush($license);

        return $this->redirectToRoute('laptop_show', array('id' => $laptop->getId()));
    }

}

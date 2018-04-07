<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\Password;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Password controller.
 *
 * @Route("password")
 */
class PasswordController extends Controller
{
    /**
     * Lists all password entities.
     *
     * @Route("/", name="password_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $passwords = $em->getRepository('ManagerITBundle:Password')->findAll();

        return $this->render('password/index.html.twig', array(
            'passwords' => $passwords,
        ));
    }

    /**
     * Creates a new password entity.
     *
     * @Route("/new", name="password_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $password = new Password();
        $form = $this->createForm('ManagerITBundle\Form\PassType', $password);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($password);
            $em->flush($password);

            return $this->redirectToRoute('password_show', array('id' => $password->getId()));
        }

        return $this->render('password/new.html.twig', array(
            'password' => $password,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a password entity.
     *
     * @Route("/{id}", name="password_show")
     * @Method("GET")
     */
    public function showAction(Password $password)
    {
        $deleteForm = $this->createDeleteForm($password);

        return $this->render('password/show.html.twig', array(
            'password' => $password,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing password entity.
     *
     * @Route("/{id}/edit", name="password_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Password $password)
    {
        $deleteForm = $this->createDeleteForm($password);
        $editForm = $this->createForm('ManagerITBundle\Form\PassType', $password);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('password_edit', array('id' => $password->getId()));
        }

        return $this->render('password/edit.html.twig', array(
            'password' => $password,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a password entity.
     *
     * @Route("/{id}", name="password_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Password $password)
    {
        $form = $this->createDeleteForm($password);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($password);
            $em->flush($password);
        }

        return $this->redirectToRoute('password_index');
    }

    /**
     * Creates a form to delete a password entity.
     *
     * @param Password $password The password entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Password $password)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('password_delete', array('id' => $password->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

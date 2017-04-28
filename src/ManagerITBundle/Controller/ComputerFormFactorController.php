<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\ComputerFormFactor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Computerformfactor controller.
 *
 * @Route("computerformfactor")
 */
class ComputerFormFactorController extends Controller
{
    /**
     * Lists all computerFormFactor entities.
     *
     * @Route("/", name="computerformfactor_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $computerFormFactors = $em->getRepository('ManagerITBundle:ComputerFormFactor')->findAll();

        return $this->render('computerformfactor/index.html.twig', array(
            'computerFormFactors' => $computerFormFactors,
        ));
    }

    /**
     * Creates a new computerFormFactor entity.
     *
     * @Route("/new", name="computerformfactor_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $computerFormFactor = new Computerformfactor();
        $form = $this->createForm('ManagerITBundle\Form\ComputerFormFactorType', $computerFormFactor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($computerFormFactor);
            $em->flush($computerFormFactor);

            return $this->redirectToRoute('computerformfactor_show', array('id' => $computerFormFactor->getId()));
        }

        return $this->render('computerformfactor/new.html.twig', array(
            'computerFormFactor' => $computerFormFactor,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a computerFormFactor entity.
     *
     * @Route("/{id}", name="computerformfactor_show")
     * @Method("GET")
     */
    public function showAction(ComputerFormFactor $computerFormFactor)
    {
        $deleteForm = $this->createDeleteForm($computerFormFactor);

        return $this->render('computerformfactor/show.html.twig', array(
            'computerFormFactor' => $computerFormFactor,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing computerFormFactor entity.
     *
     * @Route("/{id}/edit", name="computerformfactor_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ComputerFormFactor $computerFormFactor)
    {
        $deleteForm = $this->createDeleteForm($computerFormFactor);
        $editForm = $this->createForm('ManagerITBundle\Form\ComputerFormFactorType', $computerFormFactor);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('computerformfactor_edit', array('id' => $computerFormFactor->getId()));
        }

        return $this->render('computerformfactor/edit.html.twig', array(
            'computerFormFactor' => $computerFormFactor,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a computerFormFactor entity.
     *
     * @Route("/{id}", name="computerformfactor_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ComputerFormFactor $computerFormFactor)
    {
        $form = $this->createDeleteForm($computerFormFactor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($computerFormFactor);
            $em->flush($computerFormFactor);
        }

        return $this->redirectToRoute('computerformfactor_index');
    }

    /**
     * Creates a form to delete a computerFormFactor entity.
     *
     * @param ComputerFormFactor $computerFormFactor The computerFormFactor entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ComputerFormFactor $computerFormFactor)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('computerformfactor_delete', array('id' => $computerFormFactor->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

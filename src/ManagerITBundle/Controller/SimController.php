<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\Sim;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Sim controller.
 *
 * @Route("sim")
 */
class SimController extends Controller
{
    /**
     * Lists all sim entities.
     *
     * @Route("/", name="sim_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sims = $em->getRepository('ManagerITBundle:Sim')->findAll();

        return $this->render('sim/index.html.twig', array(
            'sims' => $sims,
        ));
    }

    /**
     * Creates a new sim entity.
     *
     * @Route("/new", name="sim_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $sim = new Sim();
        $form = $this->createForm('ManagerITBundle\Form\SimType', $sim);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sim);
            $em->flush($sim);

            return $this->redirectToRoute('sim_show', array('id' => $sim->getId()));
        }

        return $this->render('sim/new.html.twig', array(
            'sim' => $sim,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a sim entity.
     *
     * @Route("/{id}", name="sim_show")
     * @Method("GET")
     */
    public function showAction(Sim $sim)
    {
        $deleteForm = $this->createDeleteForm($sim);

        return $this->render('sim/show.html.twig', array(
            'sim' => $sim,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing sim entity.
     *
     * @Route("/{id}/edit", name="sim_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Sim $sim)
    {
        $deleteForm = $this->createDeleteForm($sim);
        $editForm = $this->createForm('ManagerITBundle\Form\SimType', $sim);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sim_show', array('id' => $sim->getId()));
        }

        return $this->render('sim/edit.html.twig', array(
            'sim' => $sim,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a sim entity.
     *
     * @Route("/{id}", name="sim_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Sim $sim)
    {
        $form = $this->createDeleteForm($sim);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sim);
            $em->flush($sim);
        }

        return $this->redirectToRoute('sim_index');
    }

    /**
     * Creates a form to delete a sim entity.
     *
     * @param Sim $sim The sim entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Sim $sim)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sim_delete', array('id' => $sim->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

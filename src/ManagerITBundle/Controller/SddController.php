<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\Sdd;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Sdd controller.
 *
 * @Route("sdd")
 */
class SddController extends Controller
{
    /**
     * Lists all sdd entities.
     *
     * @Route("/", name="sdd_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sdds = $em->getRepository('ManagerITBundle:Sdd')->findAll();

        return $this->render('sdd/index.html.twig', array(
            'sdds' => $sdds,
        ));
    }

    /**
     * Creates a new sdd entity.
     *
     * @Route("/new", name="sdd_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $sdd = new Sdd();
        $form = $this->createForm('ManagerITBundle\Form\SddType', $sdd);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sdd);
            $em->flush($sdd);

            return $this->redirectToRoute('sdd_show', array('id' => $sdd->getId()));
        }

        return $this->render('sdd/new.html.twig', array(
            'sdd' => $sdd,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a sdd entity.
     *
     * @Route("/{id}", name="sdd_show")
     * @Method("GET")
     */
    public function showAction(Sdd $sdd)
    {
        $deleteForm = $this->createDeleteForm($sdd);

        return $this->render('sdd/show.html.twig', array(
            'sdd' => $sdd,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing sdd entity.
     *
     * @Route("/{id}/edit", name="sdd_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Sdd $sdd)
    {
        $deleteForm = $this->createDeleteForm($sdd);
        $editForm = $this->createForm('ManagerITBundle\Form\SddType', $sdd);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sdd_edit', array('id' => $sdd->getId()));
        }

        return $this->render('sdd/edit.html.twig', array(
            'sdd' => $sdd,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a sdd entity.
     *
     * @Route("/{id}", name="sdd_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Sdd $sdd)
    {
        $form = $this->createDeleteForm($sdd);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sdd);
            $em->flush($sdd);
        }

        return $this->redirectToRoute('sdd_index');
    }

    /**
     * Creates a form to delete a sdd entity.
     *
     * @param Sdd $sdd The sdd entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Sdd $sdd)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sdd_delete', array('id' => $sdd->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

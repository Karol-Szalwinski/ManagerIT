<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\Hdd;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Hdd controller.
 *
 * @Route("hdd")
 */
class HddController extends Controller
{
    /**
     * Lists all hdd entities.
     *
     * @Route("/", name="hdd_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $hdds = $em->getRepository('ManagerITBundle:Hdd')->findAll();

        return $this->render('hdd/index.html.twig', array(
            'hdds' => $hdds,
        ));
    }

    /**
     * Creates a new hdd entity.
     *
     * @Route("/new/{desktop}", name="hdd_new", defaults={"desktop" = null})
     * @Method({"GET", "POST"})
     */
    public function newAction($desktop, Request $request)
    {
        $hdd = new Hdd();
        $form = $this->createForm('ManagerITBundle\Form\HddType', $hdd);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($hdd);
            $em->flush($hdd);

            $route = ($desktop == null) ? $this->redirectToRoute('hdd_show', array('id' => $hdd->getId())) :
                $this->redirectToRoute('desktop_components', array('id' => $desktop));
            return $route;
        }

        return $this->render('hdd/new.html.twig', array(
            'hdd' => $hdd,
            'form' => $form->createView(),
            'desktop' => $desktop,
        ));
    }

    /**
     * Finds and displays a hdd entity.
     *
     * @Route("/{id}", name="hdd_show")
     * @Method("GET")
     */
    public function showAction(Hdd $hdd)
    {
        $deleteForm = $this->createDeleteForm($hdd);

        return $this->render('hdd/show.html.twig', array(
            'hdd' => $hdd,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing hdd entity.
     *
     * @Route("/{id}/edit", name="hdd_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Hdd $hdd)
    {
        $deleteForm = $this->createDeleteForm($hdd);
        $editForm = $this->createForm('ManagerITBundle\Form\HddType', $hdd);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('hdd_edit', array('id' => $hdd->getId()));
        }

        return $this->render('hdd/edit.html.twig', array(
            'hdd' => $hdd,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a hdd entity.
     *
     * @Route("/{id}", name="hdd_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Hdd $hdd)
    {
        $form = $this->createDeleteForm($hdd);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($hdd);
            $em->flush($hdd);
        }

        return $this->redirectToRoute('hdd_index');
    }

    /**
     * Creates a form to delete a hdd entity.
     *
     * @param Hdd $hdd The hdd entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Hdd $hdd)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('hdd_delete', array('id' => $hdd->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\Os;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * O controller.
 *
 * @Route("os")
 */
class OsController extends Controller
{
    /**
     * Lists all o entities.
     *
     * @Route("/", name="os_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $os = $em->getRepository('ManagerITBundle:Os')->findAll();

        return $this->render('os/index.html.twig', array(
            'os' => $os,
        ));
    }

    /**
     * Creates a new o entity.
     *
     * @Route("/new", name="os_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $os = new Os();
        $form = $this->createForm('ManagerITBundle\Form\OsType', $os);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($os);
            $em->flush($os);

            return $this->redirectToRoute('os_show', array('id' => $os->getId()));
        }

        return $this->render('os/new.html.twig', array(
            'o' => $os,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a o entity.
     *
     * @Route("/{id}", name="os_show")
     * @Method("GET")
     */
    public function showAction(Os $o)
    {
        $deleteForm = $this->createDeleteForm($o);

        return $this->render('os/show.html.twig', array(
            'o' => $o,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing o entity.
     *
     * @Route("/{id}/edit", name="os_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Os $o)
    {
        $deleteForm = $this->createDeleteForm($o);
        $editForm = $this->createForm('ManagerITBundle\Form\OsType', $o);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('os_edit', array('id' => $o->getId()));
        }

        return $this->render('os/edit.html.twig', array(
            'o' => $o,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a o entity.
     *
     * @Route("/{id}", name="os_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Os $o)
    {
        $form = $this->createDeleteForm($o);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($o);
            $em->flush($o);
        }

        return $this->redirectToRoute('os_index');
    }

    /**
     * Creates a form to delete a o entity.
     *
     * @param Os $o The o entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Os $o)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('os_delete', array('id' => $o->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

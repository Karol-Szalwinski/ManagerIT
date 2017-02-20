<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\Departament;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Departament controller.
 *
 * @Route("departament")
 */
class DepartamentController extends Controller
{
    /**
     * Lists all departament entities.
     *
     * @Route("/", name="departament_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $departaments = $em->getRepository('ManagerITBundle:Departament')->findAll();

        return $this->render('departament/index.html.twig', array(
            'departaments' => $departaments,
        ));
    }

    /**
     * Creates a new departament entity.
     *
     * @Route("/new", name="departament_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $departament = new Departament();
        $form = $this->createForm('ManagerITBundle\Form\DepartamentType', $departament);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($departament);
            $em->flush($departament);

            return $this->redirectToRoute('departament_show', array('id' => $departament->getId()));
        }

        return $this->render('departament/new.html.twig', array(
            'departament' => $departament,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a departament entity.
     *
     * @Route("/{id}", name="departament_show")
     * @Method("GET")
     */
    public function showAction(Departament $departament)
    {
        $deleteForm = $this->createDeleteForm($departament);

        return $this->render('departament/show.html.twig', array(
            'departament' => $departament,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing departament entity.
     *
     * @Route("/{id}/edit", name="departament_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Departament $departament)
    {
        $deleteForm = $this->createDeleteForm($departament);
        $editForm = $this->createForm('ManagerITBundle\Form\DepartamentType', $departament);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('departament_edit', array('id' => $departament->getId()));
        }

        return $this->render('departament/edit.html.twig', array(
            'departament' => $departament,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a departament entity.
     *
     * @Route("/{id}", name="departament_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Departament $departament)
    {
        $form = $this->createDeleteForm($departament);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($departament);
            $em->flush($departament);
        }

        return $this->redirectToRoute('departament_index');
    }

    /**
     * Creates a form to delete a departament entity.
     *
     * @param Departament $departament The departament entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Departament $departament)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('departament_delete', array('id' => $departament->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

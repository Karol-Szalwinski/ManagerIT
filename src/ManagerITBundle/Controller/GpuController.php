<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\Gpu;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Gpu controller.
 *
 * @Route("gpu")
 */
class GpuController extends Controller
{
    /**
     * Lists all gpu entities.
     *
     * @Route("/", name="gpu_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $gpus = $em->getRepository('ManagerITBundle:Gpu')->findAll();

        return $this->render('gpu/index.html.twig', array(
            'gpus' => $gpus,
        ));
    }

    /**
     * Creates a new gpu entity.
     *
     * @Route("/new/{computer}", name="gpu_new", defaults={"computer" = null})
     * @Method({"GET", "POST"})
     */
    public function newAction($computer, Request $request)
    {
        $gpu = new Gpu();
        $form = $this->createForm('ManagerITBundle\Form\GpuType', $gpu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($gpu);
            $em->flush($gpu);
            if ($computer != null) {
                $computerToReturn = $em->getRepository('ManagerITBundle:Computer')->findOneById($computer);
                if ($computerToReturn) {
                    $type = $computerToReturn->getFormFactor();
                    return $this->redirectToRoute('computer_components', array('type' => $type, 'id' => $computer));
                }
            }

            return $this->redirectToRoute('gpu_show', array('id' => $gpu->getId()));
        }

        return $this->render('gpu/new.html.twig', array(
            'gpu' => $gpu,
            'form' => $form->createView(),
            'computer' => $computer,
        ));
    }

    /**
     * Finds and displays a gpu entity.
     *
     * @Route("/{id}", name="gpu_show")
     * @Method("GET")
     */
    public function showAction(Gpu $gpu)
    {
        $deleteForm = $this->createDeleteForm($gpu);

        return $this->render('gpu/show.html.twig', array(
            'gpu' => $gpu,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing gpu entity.
     *
     * @Route("/{id}/edit", name="gpu_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Gpu $gpu)
    {
        $deleteForm = $this->createDeleteForm($gpu);
        $editForm = $this->createForm('ManagerITBundle\Form\GpuType', $gpu);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gpu_edit', array('id' => $gpu->getId()));
        }

        return $this->render('gpu/edit.html.twig', array(
            'gpu' => $gpu,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a gpu entity.
     *
     * @Route("/{id}", name="gpu_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Gpu $gpu)
    {
        $form = $this->createDeleteForm($gpu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($gpu);
            $em->flush($gpu);
        }

        return $this->redirectToRoute('gpu_index');
    }

    /**
     * Creates a form to delete a gpu entity.
     *
     * @param Gpu $gpu The gpu entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Gpu $gpu)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('gpu_delete', array('id' => $gpu->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}

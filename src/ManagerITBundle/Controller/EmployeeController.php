<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\Employee;
use ManagerITBundle\Entity\Computer;
use ManagerITBundle\Entity\License;
use ManagerITBundle\Entity\Phone;
use ManagerITBundle\Entity\Tablet;
use ManagerITBundle\Entity\Printer;
use ManagerITBundle\Entity\User;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Employee controller.
 *
 * @Route("employee")
 */
class EmployeeController extends Controller {

    /**
     * Lists all employee entities.
     *
     * @Route("/zzz", name="employee_zzz")
     * @Method("GET")
     */
    public function employeeZZZAction() {
        $em = $this->getDoctrine()->getManager();

        $employees = $em->getRepository('ManagerITBundle:Employee')->findAll();

        foreach ($employees as $employee ){
            $user = new User;
            $user->setUsername( $employee->getName(). " " . $employee->getSurname());
            $user->setName( $employee->getName());
            $user->setUsersurname( $employee->getSurname());
            $user->setEmail($employee->getEmail() );
            $user->addRole('ROLE_USER');
            $user->setEnabled(1);
            $user->setJob($employee->getJob());
            $user->setPlainPassword('123');
            $user->setDepartament($employee->getDepartament());


            $em->persist($user);
            $em->flush($user);

            $employcomp = $employee->getComputers();

            foreach ($employcomp as $computer) {

                $user->addComputer($computer);

                $computer->addUser($user);
                $em->flush($user);

            };

            $employtablet = $employee->getTablets();
            foreach ($employtablet as $tablet) {
                $user->addTablet($tablet);
                $tablet->addUser($user);
                $em->flush();
            };

            $employPhone = $employee->getPhones() ;
            foreach ($employPhone as $phone) {
                $user->addPhone($phone);
                $phone->addUser($user);
                $em->flush();
            };

            $employPrint = $employee->getPrinters();
            foreach ($employPrint as $printer) {
                $user->addPrinter($printer);
                $printer->addUser($user);
                $em->flush();
            };

        }

        return $this->render('employee/index.html.twig', array(
            'employees' => $employees,
        ));
    }


    /**
     * Lists all employee entities.
     *
     * @Route("/", name="employee_index")
     * @Method("GET")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $employees = $em->getRepository('ManagerITBundle:Employee')->findAll();

        return $this->render('employee/index.html.twig', array(
                    'employees' => $employees,
        ));
    }



    /**
     * Creates a new employee entity.
     *
     * @Route("/new", name="employee_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request) {
        $employee = new Employee();
        $form = $this->createForm('ManagerITBundle\Form\EmployeeType', $employee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($employee);
            $em->flush($employee);

            return $this->redirectToRoute('employee_show', array('id' => $employee->getId()));
        }

        return $this->render('employee/new.html.twig', array(
                    'employee' => $employee,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a employee entity.
     *
     * @Route("/{id}", name="employee_show")
     * @Method("GET")
     */
    public function showAction(Employee $employee) {
        $deleteForm = $this->createDeleteForm($employee);

        return $this->render('employee/show.html.twig', array(
                    'employee' => $employee,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing employee entity.
     *
     * @Route("/{id}/edit", name="employee_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Employee $employee) {
        $deleteForm = $this->createDeleteForm($employee);
        $editForm = $this->createForm('ManagerITBundle\Form\EmployeeType', $employee);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('employee_show', array('id' => $employee->getId()));
        }

        return $this->render('employee/edit.html.twig', array(
                    'employee' => $employee,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a employee entity.
     *
     * @Route("/{id}", name="employee_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Employee $employee) {
        $form = $this->createDeleteForm($employee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($employee);
            $em->flush($employee);
        }

        return $this->redirectToRoute('employee_index');
    }

    /**
     * Creates a form to delete a employee entity.
     *
     * @param Employee $employee The employee entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Employee $employee) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('employee_delete', array('id' => $employee->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

    /**
     * Action to disconnect employee with computer
     * 
     *  @Route("/{employee}/remove_computer/{computer}", name="employee_remove_computer")
     *  @Method({"GET"})
     */
    public function removeComputerAction(Employee $employee, Computer $computer) {
        $employee->removeComputer($computer);
        $computer->removeEmployee($employee);
        $this->getDoctrine()->getManager()->flush();

        $deleteForm = $this->createDeleteForm($employee);

        return $this->render('employee/show.html.twig', array(
                    'employee' => $employee,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Action to disconnect employee with tablet
     *
     *  @Route("/{employee}/remove_tablet/{tablet}", name="employee_remove_tablet")
     *  @Method({"GET"})
     */
    public function removeTabletAction(Employee $employee, Tablet $tablet) {
        $employee->removeTablet($tablet);
        $tablet->removeEmployee($employee);
        $this->getDoctrine()->getManager()->flush();

        $deleteForm = $this->createDeleteForm($employee);

        return $this->render('employee/show.html.twig', array(
                    'employee' => $employee,
                    'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Action to disconnect employee with phone
     *
     *  @Route("/{employee}/remove_phone/{phone}", name="employee_remove_phone")
     *  @Method({"GET"})
     */
    public function removePhoneAction(Employee $employee, Phone $phone) {
        $employee->removePhone($phone);
        $phone->removeEmployee($employee);
        $this->getDoctrine()->getManager()->flush();

        $deleteForm = $this->createDeleteForm($employee);

        return $this->render('employee/show.html.twig', array(
                    'employee' => $employee,
                    'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Action to disconnect employee with printer
     *
     *  @Route("/{employee}/remove_printer/{printer}", name="employee_remove_printer")
     *  @Method({"GET"})
     */
    public function removePrinterAction(Employee $employee, Printer $printer) {
        $employee->removePrinter($printer);
        $printer->removeEmployee($employee);
        $this->getDoctrine()->getManager()->flush();

        $deleteForm = $this->createDeleteForm($employee);

        return $this->render('employee/show.html.twig', array(
                    'employee' => $employee,
                    'delete_form' => $deleteForm->createView(),
        ));
    }


    /**
     * Action to disconnect employee with license
     *
     *  @Route("/{employee}/remove_license/{license}", name="employee_remove_license")
     *  @Method({"GET"})
     */
    public function removeLicenseAction(Employee $employee, License $license) {
        $employee->removeLicense($license);
        $license->removeEmployee($employee);
        $this->getDoctrine()->getManager()->flush();

        $deleteForm = $this->createDeleteForm($employee);

        return $this->render('employee/show.html.twig', array(
            'employee' => $employee,
            'delete_form' => $deleteForm->createView(),
        ));
    }

//    /**
//     * kopiowanie userow
//     *
//     *  @Route("/copys", name="copy_users")
//     *  @Method({"GET"})
//     */
//    public function copyUsersAction() {
//
//        $em = $this->getDoctrine()->getManager();
//        $employees = $em->getRepository('ManagerITBundle:Employee')->findAll();
//
//        foreach ($employees as $employee ){
//            $user = new User;
//            $user->setUsername( $employee->getName());
//            $user->setName( $employee->getName());
//            $user->setUsersurname( $employee->getSurname());
//            $user->setEmail($employee->getEmail());
//            $user->addRole('ROLE_USER');
//            $user->setEnabled(1);
//            $user->setPlainPassword('123');
//
//            $em->persist($user);
//            $em->flush($user);
//
//        }
//
//        return null;
//    }



}

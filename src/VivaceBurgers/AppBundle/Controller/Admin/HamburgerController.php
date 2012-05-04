<?php

namespace VivaceBurgers\AppBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use VivaceBurgers\AppBundle\Entity\Hamburger;
use VivaceBurgers\AppBundle\Form\HamburgerType;

/**
 * Hamburger controller.
 *
 * @Route("/admin/hamburger")
 */
class HamburgerController extends Controller
{
    /**
     * Lists all Hamburger entities.
     *
     * @Route("/", name="admin_hamburger")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('VivaceBurgersAppBundle:Hamburger')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Hamburger entity.
     *
     * @Route("/{id}/show", name="admin_hamburger_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('VivaceBurgersAppBundle:Hamburger')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Hamburger entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Hamburger entity.
     *
     * @Route("/new", name="admin_hamburger_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Hamburger();
        $form   = $this->createForm(new HamburgerType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Hamburger entity.
     *
     * @Route("/create", name="admin_hamburger_create")
     * @Method("post")
     * @Template("VivaceBurgersAppBundle:Hamburger:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Hamburger();
        $request = $this->getRequest();
        $form    = $this->createForm(new HamburgerType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_hamburger_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Hamburger entity.
     *
     * @Route("/{id}/edit", name="admin_hamburger_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('VivaceBurgersAppBundle:Hamburger')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Hamburger entity.');
        }

        $editForm = $this->createForm(new HamburgerType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Hamburger entity.
     *
     * @Route("/{id}/update", name="admin_hamburger_update")
     * @Method("post")
     * @Template("VivaceBurgersAppBundle:Hamburger:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('VivaceBurgersAppBundle:Hamburger')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Hamburger entity.');
        }

        $editForm   = $this->createForm(new HamburgerType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_hamburger_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Hamburger entity.
     *
     * @Route("/{id}/delete", name="admin_hamburger_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('VivaceBurgersAppBundle:Hamburger')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Hamburger entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_hamburger'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}

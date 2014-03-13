<?php
namespace Admin\AdminBundle\Form;

use Symfony\Component\Form\Form;
/* event listner */
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
/* event listner ends */
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EditProfileType extends AbstractType
{
    /**
    * @param FormBuilderInterface
    * @param array $options
    */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
            //$builder->add('username');
            $builder->add('firstname');
            $builder->add('lastname');
            $builder->add('address');
            $builder->add('gender','choice',array('choices'=> array('Male' =>'Male','Female'=>'Female'),'required'=> true,)

                );
            $builder->add('updated');
            // Events Listner
            $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event){
                $profile = $event->getData();
                $form = $event->getForm();



                if (!$profile || null === $profile->getId()) {
                    //var_dump($profile->getId());die();
                    $form->add('username');
                    $form->add('password');
                    $form->add('salt');
                    $form->add('email');
                    $form->add('roles');
                    $form->add('isActive');
                    $form->add('added');
                }
            });

            $builder->add('submit', 'submit', array('label' => 'Update','attr'   =>  array(
                'class'   => 'btn btn-info','name' =>'editProfile','value'=>'updateProfile')));
    }
    /**
    * @param OptionsResolverInterface $resolver
    */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Admin\AdminBundle\Entity\Admin'
        ));
    }
    /**
    * @return string
    */
    public function getName()
    {
        return 'admin_adminbundle_admin';
    }
}
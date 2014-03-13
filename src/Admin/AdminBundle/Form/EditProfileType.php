<?php
namespace Admin\AdminBundle\Form;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Form;
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
            $builder->add('username');
            $builder->add('firstname');
            $builder->add('lastname');
            $builder->add('address');
            $builder->add('gender','choice',
                            array(
                        'choices'   => array('Male' => 'Male', 'Female' => 'Female'),
                        'required'  => true,
                         )
                );
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
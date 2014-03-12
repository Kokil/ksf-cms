<?php

namespace Admin\BlogBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\TextField;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlogType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {



            $builder->add('title');
            $builder->add('category');
            //$builder->add('category', 'entity',
            //    array('class' => 'AdminBlogBundle:BlogCategory'));
            $builder->add('author');
            $builder->add('slug');
            $builder->add('short');
            $builder->add('image');
            $builder->add('detail');
            $builder->add('status');
            $builder->add('added');
            $builder->add('updated');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Admin\BlogBundle\Entity\Blog'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'admin_blogbundle_blog';
    }
}

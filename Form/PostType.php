<?php

namespace RJM\Bundle\GenemuSandboxBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('body')
            ->add('publishedAt')
            ->add('active')
            ->add('author', 'genemu_jqueryselect2_entity', array(
                'class' => 'RJM\Bundle\GenemuSandboxBundle\Entity\Author',
                'property' => 'username',
            ))

            ->add('category', 'genemu_jqueryselect2_entity', array(
                'class' => 'RJM\Bundle\GenemuSandboxBundle\Entity\Category',
                'property' => 'name',
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RJM\Bundle\GenemuSandboxBundle\Entity\Post'
        ));
    }

    public function getName()
    {
        return 'rjm_bundle_genemusandboxbundle_posttype';
    }
}

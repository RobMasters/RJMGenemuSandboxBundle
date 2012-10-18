<?php

namespace RJM\Bundle\GenemuSandboxBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AuthorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('email')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RJM\Bundle\GenemuSandboxBundle\Entity\Author'
        ));
    }

    public function getName()
    {
        return 'rjm_bundle_genemusandboxbundle_authortype';
    }
}

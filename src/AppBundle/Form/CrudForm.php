<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CrudForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('column1', TextType::class, array('label' => 'Column 1'))
            ->add('column2', TextType::class, array('label' => 'Column 2'))
            ->add('column3', TextType::class, array('label' => 'Column 3'))
            ->add('column4', TextType::class, array('label' => 'Column 4'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
           'data_class' => 'AppBundle\Entity\Crud'
        ]);
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_crud_form';

    }
}

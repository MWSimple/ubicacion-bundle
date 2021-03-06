<?php

namespace Matudelatower\UbicacionBundle\Form\Type;

use Matudelatower\UbicacionBundle\Form\EventListener\AddDepartamentoFieldSubscriber;
use Matudelatower\UbicacionBundle\Form\EventListener\AddLocalidadFieldSubscriber;
use Matudelatower\UbicacionBundle\Form\EventListener\AddPaisFieldSubscriber;
use Matudelatower\UbicacionBundle\Form\EventListener\AddProvinciaFieldSubscriber;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MatudelatowerLocalidadType extends AbstractType {
	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm( FormBuilderInterface $builder, array $options ) {
		$factory = $builder->getFormFactory();

		$builder->addEventSubscriber( new AddPaisFieldSubscriber( $factory ) );
		$builder->addEventSubscriber( new AddProvinciaFieldSubscriber( $factory ) );
		$builder->addEventSubscriber( new AddDepartamentoFieldSubscriber( $factory ) );
		$builder->addEventSubscriber( new AddLocalidadFieldSubscriber( $factory ) );
	}

	/**
	 * @param OptionsResolver $resolver
	 */
	public function configureOptions( OptionsResolver $resolver ) {
		$resolver->setDefaults( array(
			'data_class' => 'Matudelatower\UbicacionBundle\Entity\Localidad'
		) );
	}

	public function getBlockPrefix() {
		return 'matudelatower_ubicacionbundle_matudelatower_localidad_type';
	}

	public function getName() {
		return $this->getBlockPrefix();
	}
}

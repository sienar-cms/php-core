<?php

namespace Sienar\Actions;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @template T
 */
abstract class StatusAction extends AbstractController {
	private readonly EventDispatcherInterface $dispatcher;
	private readonly SerializerInterface $serializer;

	/**
	 * @param EventDispatcherInterface $dispatcher
	 * @param SerializerInterface $serializer
	 */
	public function __construct(
		EventDispatcherInterface $dispatcher,
		SerializerInterface $serializer
	) {
		$this->dispatcher = $dispatcher;
		$this->serializer = $serializer;
	}

	public function __invoke(Request $request): Response {

	}

	/**
	 * @param Request $request
	 *
	 * @return mixed
	 */
	protected abstract function mapRequest(Request $request): mixed;
}
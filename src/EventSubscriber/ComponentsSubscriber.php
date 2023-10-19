<?php


namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\UX\TwigComponent\Event\PreRenderEvent;
use function array_map;
use function explode;
use function implode;
use function ucfirst;

/**
 * Permet de chercher automatiquement les templates des composants depuis le name/name.twig
 */
class ComponentsSubscriber implements EventSubscriberInterface
{

    public static function getSubscribedEvents(): array
    {
        return [
            PreRenderEvent::class => 'onPreRender',
        ];
    }

    public function onPreRender(PreRenderEvent $event): void
    {
        // Récupère le nom du composant
        $componentName = $event->getMetadata()->get('key');

        // Défini le nom du dossier
        $componentFolderName = $this->getFolderName($componentName);

        // Modifie le chemin du template
        $template = $componentFolderName . '/' . $componentName . '.twig';
        dump($template);
        $event->setTemplate($template);
    }

    /*
     * Un composant 'menu-primary' va charger 'MenuPrimary/MenuPrimary.php
     */
    private function getFolderName(string $componentName): string
    {
        $chunks = explode('-', $componentName);
        $chunks = array_map(static function ($chunk) {
            return ucfirst($chunk);
        }, $chunks);

        return implode('', $chunks);
    }

}

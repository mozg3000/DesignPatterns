<?php


namespace Service\SocialNetworks;


use Model\Entity\User;
use Service\Communication\CommunicationInterface;
use Service\Communication\Exception\CommunicationException;

class InstagramAdapter implements CommunicationInterface
{

    /**
     * Точка входа по формированию и отправке сообщения пользователю
     * @param User $user
     * @param string $templateName
     * @param array $params
     * @return void
     * @throws CommunicationException
     */
    public function process(User $user, string $templateName, array $params = []): void
    {
        // TODO: Здесь логика работы с соц. сетью.
        // TODO: Предполагается, что класс User содержит необходимые уч. данные для работы с сетью,
        // TODO: если нет, то для него тоже нужно делать обёртку, наследника, или что-то ещё.
    }
}
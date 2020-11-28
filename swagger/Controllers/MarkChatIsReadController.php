<?php
/**
 * @OA\Tag(
 *     name="Chat",
 *     description="Real-time chat routes",
 * )
 */

/**
 * @OA\Get(
 *      path="/mark-chat-is-read",
 *      security={{"bearerAuth":{}}},
 *      operationId="markChatisRead",
 *      tags={"Chat"},
 *      summary="Mark chat messages read",
 *      description="Mark chat messages read",
 *      @OA\Response(response=403, description="Доступ запрещен"),
 *      @OA\Response(response=200, description="OK"),
 * )
 */

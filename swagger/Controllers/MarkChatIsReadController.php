<?php
/**
 * @OA\Tag(
 *     name="Опросы",
 *     description="Опросы, голосование",
 * )
 */

/**
 * @OA\Get(
 *      path="/polls/answers",
 *      security={{"bearerAuth":{}}},
 *      operationId="getAnswersList",
 *      tags={"Опросы"},
 *      summary="Список ответов",
 *      description="Получить полный список ответов",
 *      @OA\Response(response=403, description="Доступ запрещен"),
 *      @OA\Response(response=200, description="OK"),
 * )
 */

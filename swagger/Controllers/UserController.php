<?php
/**
* @OA\Get(path="/user",
*   tags={"user"},
*   summary="Get the details of an authenticated user",
*   description="",
*   operationId="getAuthUser",
*   @OA\Response(
*     response=200,
*     description="successful operation",
*     @OA\Schema(type="string"),
*     @OA\Header(
*       header="X-Rate-Limit",
*       @OA\Schema(
*           type="integer",
*           format="int32"
*       ),
*       description="calls per hour allowed by the user"
*     ),
*     @OA\Header(
*       header="X-Expires-After",
*       @OA\Schema(
*          type="string",
*          format="date-time",
*       ),
*       description="date in UTC when token expires"
*     )
*   ),
*   @OA\Response(response=400, description="Error xXx"),
*     security={
*       {"api_key": {}}
*     }
* )
*/

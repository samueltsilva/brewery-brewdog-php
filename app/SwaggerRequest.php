<?php

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Brewery Brewdog API"
 * )
 */

/**
 *  @OA\Server(
 *      url="http://localhost:8080",
 *      description="Local Server"
 * )
 */

/**
 * @OA\SecurityScheme(
 *      securityScheme="bearerAuth",
 *      in="header",
 *      name="bearerAuth",
 *      type="http",
 *      scheme="bearer",
 *      bearerFormat="JWT",
 * ),
 *
/**
 * @OA\Post(
 *     tags={"Login"},
 *     path="/login",
 *     description="Users login.",
 *     security={{"bearerAuth":{}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(property="username",type="string"),
 *                 @OA\Property(property="password",type="string"),
 *             ),
 *         ),
 *     ),
 *     @OA\Response(response="201", description="Sucess",
 *         content={
 *             @OA\MediaType(
 *                 mediaType="application/json",
 *                 @OA\Schema(
 *                     type="array",
 *                     @OA\Items(
 *                      @OA\Property(property="message", type="string"),
 *                      @OA\Property(property="internalCode", type="integer"),
 *                      @OA\Property(property="auth", type="object",
 *                          @OA\Property(property="token", type="string"),
 *                          @OA\Property(property="type", type="string"),
 *                          @OA\Property(property="expiresAt", type="string"),
 *                     ),
 *                )
 *                )
 *            )
 *        }
 *     ),
 *     @OA\Response(response="401", description="Unauthorized"),
 *     @OA\Response(response="403", description="Forbidden"),
 *     @OA\Response(response="404", description="Not Found"),
 *     @OA\Response(response="406", description="Not Acceptable"),
 *     @OA\Response(response="500", description="Internal Server Error")
 *
 * )
 */

/**
 *  @OA\Get(
 *     tags={"User operations"},
 *     path="/user",
 *     description="Get the user from the database.",
 *     security={{"bearerAuth":{}}},
 * @OA\Parameter(
 *      parameter="general--page",
 *      in="query",
 *      name="idUsers",
 *      description="The id_users.",
 *      @OA\Schema(
 *          type="integer",
 *          default=1,
 *      )
 * ),
 * @OA\Parameter(
 *      parameter="general--page",
 *      in="query",
 *      name="username",
 *      description="The unique username of the user.",
 *      @OA\Schema(
 *          type="string",
 *          default="",
 *      )
 * ),
 *     @OA\Response(response="200", description="Sucess",
 *         content={
 *             @OA\MediaType(
 *                 mediaType="application/json",
 *                 @OA\Schema(
 *                     type="array",
 *                     @OA\Items(
 *                      @OA\Property(property="message", type="string"),
 *                      @OA\Property(property="internalCode", type="integer"),
 *                      @OA\Property(property="user", type="object",
 *                          @OA\Property(property="id_users", type="integer"),
 *                          @OA\Property(property="username", type="string"),
 *                          @OA\Property(property="password", type="string"),
 *                          @OA\Property(property="first_name", type="string"),
 *                          @OA\Property(property="last_name", type="string"),
 *                          @OA\Property(property="address", type="string"),
 *                          @OA\Property(property="number", type="integer"),
 *                          @OA\Property(property="status", type="integer"),
 *                          @OA\Property(property="created_at", type="string"),
 *                          @OA\Property(property="updated_at", type="string"),
 *                          @OA\Property(property="deleted_at", type="string"),
 *                     ),
 *                 )
 *               )
 *            )
 *        }
 *     ),
 *     @OA\Response(response="401", description="Unauthorized"),
 *     @OA\Response(response="403", description="Forbidden"),
 *     @OA\Response(response="404", description="Not Found"),
 *     @OA\Response(response="406", description="Not Acceptable"),
 *     @OA\Response(response="500", description="Internal Server Error")
 * )
 */

/**
 * @OA\Post(
 *     tags={"User operations"},
 *     path="/user",
 *     description="Creates a user.",
 *     security={{"bearerAuth":{}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(property="username",type="string"),
 *                 @OA\Property(property="password",type="string"),
 *                 @OA\Property(property="firstName",type="string"),
 *                 @OA\Property(property="address",type="string"),
 *                 @OA\Property(property="number",type="integer"),
 *                 @OA\Property(property="lastName",type="string"),
 *             ),
 *         ),
 *     ),
 *     @OA\Response(response="201", description="Sucess",
 *         content={
 *             @OA\MediaType(
 *                 mediaType="application/json",
 *                 @OA\Schema(
 *                     type="array",
 *                     @OA\Items(
 *                      @OA\Property(property="message", type="string"),
 *                      @OA\Property(property="internalCode", type="integer"),
 *                      @OA\Property(property="idUsers", type="integer"),
 *                )
 *               )
 *            )
 *        }
 *     ),
 *     @OA\Response(response="401", description="Unauthorized"),
 *     @OA\Response(response="403", description="Forbidden"),
 *     @OA\Response(response="404", description="Not Found"),
 *     @OA\Response(response="406", description="Not Acceptable"),
 *     @OA\Response(response="500", description="Internal Server Error")
 *
 * )
 */

/**
 * @OA\Put(
 *     tags={"User operations"},
 *     path="/user",
 *     description="Updates a user.",
 *     security={{"bearerAuth":{}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(property="idUsers",type="integer"),
 *                 @OA\Property(property="username",type="string"),
 *                 @OA\Property(property="password",type="string"),
 *                 @OA\Property(property="firstName",type="string"),
 *                 @OA\Property(property="lastName",type="string"),
 *                 @OA\Property(property="address",type="string"),
 *                 @OA\Property(property="number",type="integer"),
 *                 @OA\Property(property="status",type="integer"),
 *             ),
 *         ),
 *     ),
 *     @OA\Response(response="201", description="Sucess",
 *         content={
 *             @OA\MediaType(
 *                 mediaType="application/json",
 *                 @OA\Schema(
 *                     type="array",
 *                     @OA\Items(
 *                      @OA\Property(property="message", type="string"),
 *                      @OA\Property(property="internalCode", type="integer"),
 *                      @OA\Property(property="updated", type="boolean"),
 *                )
 *               )
 *            )
 *        }
 *     ),
 *     @OA\Response(response="401", description="Unauthorized"),
 *     @OA\Response(response="403", description="Forbidden"),
 *     @OA\Response(response="404", description="Not Found"),
 *     @OA\Response(response="406", description="Not Acceptable"),
 *     @OA\Response(response="500", description="Internal Server Error")
 *
 * )
 */

/**
 * @OA\Delete(
 *     tags={"User operations"},
 *     path="/user",
 *     description="Deletes a user.",
 *     security={{"bearerAuth":{}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(property="idUsers",type="integer"),
 *             ),
 *         ),
 *     ),
 *     @OA\Response(response="201", description="Sucess",
 *         content={
 *             @OA\MediaType(
 *                 mediaType="application/json",
 *                 @OA\Schema(
 *                     type="array",
 *                     @OA\Items(
 *                      @OA\Property(property="message", type="string"),
 *                      @OA\Property(property="internalCode", type="integer"),
 *                      @OA\Property(property="deleted", type="boolean"),
 *                )
 *               )
 *            )
 *        }
 *     ),
 *     @OA\Response(response="401", description="Unauthorized"),
 *     @OA\Response(response="403", description="Forbidden"),
 *     @OA\Response(response="404", description="Not Found"),
 *     @OA\Response(response="406", description="Not Acceptable"),
 *     @OA\Response(response="500", description="Internal Server Error")
 *
 * )
 */


/**
 *  @OA\Get(
 *     tags={"Beers"},
 *     path="/beers",
 *     description="route to get the beers from Brewery Brewdog.",
 *     security={{"bearerAuth":{}}},
 * @OA\Parameter(
 *      parameter="general--page",
 *      in="query",
 *      name="idUsers",
 *      description="The id_users.",
 *      @OA\Schema(
 *          type="integer",
 *          default=1,
 *      )
 * ),
 * @OA\Parameter(
 *      parameter="general--page",
 *      in="query",
 *      name="username",
 *      description="The unique username of the user.",
 *      @OA\Schema(
 *          type="string",
 *          default="",
 *      )
 * ),
 *     @OA\Response(response="200", description="Sucess",
 *         content={
 *             @OA\MediaType(
 *                 mediaType="application/json",
 *                 @OA\Schema(
 *                     type="array",
 *                     @OA\Items(
 *                      @OA\Property(property="message", type="string"),
 *                      @OA\Property(property="internalCode", type="integer"),
 *                      @OA\Property(property="user", type="object",
 *                          @OA\Property(property="id_users", type="integer"),
 *                          @OA\Property(property="username", type="string"),
 *                          @OA\Property(property="password", type="string"),
 *                          @OA\Property(property="first_name", type="string"),
 *                          @OA\Property(property="last_name", type="string"),
 *                          @OA\Property(property="address", type="string"),
 *                          @OA\Property(property="number", type="integer"),
 *                          @OA\Property(property="status", type="integer"),
 *                          @OA\Property(property="created_at", type="string"),
 *                          @OA\Property(property="updated_at", type="string"),
 *                          @OA\Property(property="deleted_at", type="string"),
 *                     ),
 *                 )
 *               )
 *            )
 *        }
 *     ),
 *     @OA\Response(response="401", description="Unauthorized"),
 *     @OA\Response(response="403", description="Forbidden"),
 *     @OA\Response(response="404", description="Not Found"),
 *     @OA\Response(response="406", description="Not Acceptable"),
 *     @OA\Response(response="500", description="Internal Server Error")
 * )
 */

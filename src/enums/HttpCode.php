<?php
namespace Homework\Firstapi\enums;
enum HttpCode
{
    const ok = 200;
    const created = 201;
    const noContent = 204;
    const userError = 404;
    const methodNotAllowed = 405;
    const serverError = 500;
}

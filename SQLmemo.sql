SELECT
    problems.id as ProblemID,
    users.id    as UserID,
    (CASE
        WHEN problems.id = ActiveLogs.problem_id AND users.id = activelogs.user_id THEN 1
        ELSE 0
    END) AS isSolve
FROM activelogs
INNER JOIN problems ON problems.id = ActiveLogs.problem_id
INNER JOIN users ON activelogs.user_id = users.id
ORDER BY users.id ASC ,problems.id ASC;

SELECT
    problems.id,
    problems .title,
    problems.point,
    category.category,
    if (userSolve.problem_id IS NOT NULL , 1 ,0 ) AS isSolve
from
    problems
LEFT OUTER JOIN

    (SELECT problem_id , user_id FROM activeLogs WHERE user_id = 1 ORDER BY problem_id ASC) AS userSolve ON userSolve.problem_id = problems.id
INNER JOIN
    category ON category.id = problems.category
ORDER BY problems.id ASC;


CEILING

SELECT
    ( SELECT SUM(point) FROM problems WHERE id IN ( SELECT problem_id FROM ActiveLogs WHERE user_id = 2 ) ) AS sumPoint,
    ( CEILING( ( SELECT SUM(point) FROM problems WHERE id IN ( SELECT problem_id FROM ActiveLogs WHERE user_id = 2 ) )/500 ) ) AS Rank ,
    ( SELECT count(id) FROM activelogs WHERE user_id = 2 ) AS SolveCount ,
    name
FROM
    users
WHERE
    id =2;


SELECT
    COUNT(
    CASE
        WHEN category.category = "Web" THEN 1
        ELSE 0
    END
    )
FROM
    ActiveLogs
INNER JOIN problems ON problems.id = ActiveLogs.problem_id
INNER JOIN category ON category.id = problems.category
WHERE
    user_id = 1

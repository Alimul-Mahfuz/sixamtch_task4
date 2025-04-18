<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task Details</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px;">
<p>
    Welcome! You have successfully created the task.
</p>
<table width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width: 600px; margin: auto; background-color: #ffffff; border: 1px solid #dddddd;">
    <tr>
        <td style="padding: 20px;">
            <h2 style="color: #333333;">Task Details</h2>
            <hr style="border: 0; border-top: 1px solid #eeeeee;">
            <p style="font-size: 16px;"><strong>Task Name:</strong> {{ $task->name }}</p>
            <p style="font-size: 16px;"><strong>Description:</strong> {{ $task->description }}</p>
            <p style="font-size: 16px;"><strong>Status:</strong> {{ $task->status }}</p>
            <p style="font-size: 16px;"><strong>Assigned To:</strong> {{ $task->assignedTo->name ?? 'Self' }}</p>
            <p style="font-size: 16px;"><strong>Deadline:</strong> {{ $task->deadline }}</p>
        </td>
    </tr>
</table>
</body>
</html>

import React from "react";

function TaskList({ tasks, deleteTask }) {
  return (
    <ul>
      {tasks.map((task, index) => (
        <li key={index}>
          {task} 
          <button onClick={() => deleteTask(task)}>Delete</button>
        </li>
      ))}
    </ul>
  );
}

export default TaskList;

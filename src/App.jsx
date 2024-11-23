import React, { useState } from "react";
import TaskList from "./TaskList";
import TaskForm from "./TaskForm";

function App() {
  // タスクの状態を管理
  const [tasks, setTasks] = useState([]);
  
  // タスクを追加する関数
  const addTask = (task) => {
    setTasks([...tasks, task]);
  };

  // タスクを削除する関数
  const deleteTask = (taskToDelete) => {
    setTasks(tasks.filter(task => task !== taskToDelete));
  };

  return (
    <div>
      <h1>Task Manager</h1>
      
      {/* タスク追加フォーム */}
      <TaskForm addTask={addTask} />
      
      {/* タスクリスト */}
      <TaskList tasks={tasks} deleteTask={deleteTask} />

      {/* リンクを追加 */}
      <div>
        <p>
          <a href="http://127.0.0.1:8080/" target="_blank" rel="noopener noreferrer">
            Visit http://127.0.0.1:8080/
          </a>
        </p>
        <p>パス : <code>/Users/user1/Desktop/vite-project/src/App.jsx</code></p>
      </div>
    </div>
  );
}

export default App;

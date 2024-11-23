import React, { useState } from "react";

function TaskForm({ addTask }) {
  const [task, setTask] = useState(""); // 新しいタスクの状態

  const handleSubmit = (e) => {
    e.preventDefault();
    if (task.trim()) {
      addTask(task); // タスクを追加
      setTask(""); // 入力フィールドをクリア
    }
  };

  return (
    <form onSubmit={handleSubmit}>
      <input
        type="text"
        value={task}
        onChange={(e) => setTask(e.target.value)}
        placeholder="New task"
      />
      <button type="submit">Add Task</button>
    </form>
  );
}

export default TaskForm;

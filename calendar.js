const calendarDays = document.querySelector('.calendar-days');
const monthYear = document.getElementById('monthYear');
const prevBtn = document.getElementById('prev');
const nextBtn = document.getElementById('next');

let currentDate = new Date();
let tareas = [];

// Función para cargar y mostrar el calendario
function loadCalendar(date) {
  calendarDays.innerHTML = '';

  const year = date.getFullYear();
  const month = date.getMonth();

  // Mostrar mes y año (formato local en español)
  monthYear.textContent = date.toLocaleDateString('es-ES', { month: 'long', year: 'numeric' });

  // Primer día del mes
  const firstDay = new Date(year, month, 1);
  // Último día del mes
  const lastDay = new Date(year, month + 1, 0);

  // Día de la semana del primer día (0=Dom, 1=Lun, ...)
  // Ajustamos para que lunes sea 0
  let startDay = firstDay.getDay();
  startDay = (startDay === 0) ? 6 : startDay - 1;

  // Agregar celdas vacías antes del primer día para alinear
  for(let i = 0; i < startDay; i++) {
    const emptyCell = document.createElement('div');
    emptyCell.classList.add('empty');
    calendarDays.appendChild(emptyCell);
  }

  // Agregar días del mes con sus tareas
  for(let day = 1; day <= lastDay.getDate(); day++) {
    const dayCell = document.createElement('div');
    dayCell.classList.add('day');
    dayCell.textContent = day;

    const dateStr = `${year}-${String(month+1).padStart(2,'0')}-${String(day).padStart(2,'0')}`;

    // Filtrar tareas del día actual
    const tareasDelDia = tareas.filter(t => t.date === dateStr);

    // Mostrar título de cada tarea dentro del día
    tareasDelDia.forEach(tarea => {
      const tareaDiv = document.createElement('div');
      tareaDiv.classList.add('tarea');
      tareaDiv.textContent = tarea.title;
      dayCell.appendChild(tareaDiv);
    });

    calendarDays.appendChild(dayCell);
  }
}

// Función para cargar tareas desde la API
function fetchTareas() {
  fetch('api.php')
    .then(response => response.json())
    .then(data => {
      tareas = data;
      loadCalendar(currentDate);
    })
    .catch(err => {
      console.error('Error al cargar tareas:', err);
    });
}

// Eventos para cambiar mes
prevBtn.addEventListener('click', () => {
  currentDate.setMonth(currentDate.getMonth() - 1);
  loadCalendar(currentDate);
});

nextBtn.addEventListener('click', () => {
  currentDate.setMonth(currentDate.getMonth() + 1);
  loadCalendar(currentDate);
});

// Carga inicial
fetchTareas();

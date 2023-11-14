  // Verificar si la barra está abierta o cerrada en el almacenamiento local
  const isSidebarOpen = localStorage.getItem('sidebarOpen') === 'true';
  const sidebar = document.getElementById('sidebar');
  const toggleBtn = document.querySelector('.toggle-btn');

  // Función para abrir/cerrar la barra y cambiar el icono
  const toggleSidebar = () => {
    sidebar.classList.toggle('active');
    // Cambiar el icono
    const icon = document.querySelector('.flecha-gestiones ion-icon');
    const iconName = sidebar.classList.contains('active') ? 'caret-back' : 'caret-forward';
    icon.setAttribute('name', iconName);
    // Guardar el estado en el almacenamiento local
    localStorage.setItem('sidebarOpen', sidebar.classList.contains('active'));
  };

  // Establecer el estado inicial de la barra
  if (isSidebarOpen) {
    sidebar.classList.add('active');
    const icon = document.querySelector('.flecha-gestiones ion-icon');
    icon.setAttribute('name', 'caret-back');
  }

  // Asignar el evento de clic al botón de alternar
  toggleBtn.addEventListener('click', toggleSidebar);
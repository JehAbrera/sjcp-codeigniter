

//js for creating a calendar


function showdocument() {
    var x = document.getElementById("selectEvent").value;

    if (x == "Document Request") {
        document.getElementById("selectDocument").className = "select select-bordered join-item w-full mb-8 block";
        document.getElementById("selectDocument").required  = true ;
    } else {
        document.getElementById("selectDocument").className = "select select-bordered join-item w-full mb-8 hidden";
    }
}

const selectedday = document.getElementById('daySelected');
const selectedmonth = document.getElementById('month');
const selectedyear = document.getElementById('year');
// Initialize the calendar with the current month and year
let currentYear = selectedyear.value;
let currentMonth = selectedmonth.value;
generateCalendar(currentYear, currentMonth);

// Event listeners for previous and next month buttons
document.getElementById('prevMonth').addEventListener('click', () => {
    currentMonth--;
    const d = new Date();
    let month = d.getMonth();
    let yearr = d.getFullYear();
    if (currentMonth < 0) 
    {
        currentMonth = 11;
        currentYear--;
    }
    else if (currentMonth < month && currentYear==yearr) 
    {
        currentMonth++;
    }
    generateCalendar(currentYear, currentMonth);
});

document.getElementById('nextMonth').addEventListener('click', () => {
    currentMonth++;
    const d = new Date();
    let month = d.getMonth();
    let yearr = d.getFullYear();
    if (currentMonth > 11) 
    {
        currentMonth = 0;
        currentYear++;
    }
    else if (currentMonth > month && currentYear != yearr) 
    {
        currentMonth--;
    }
    generateCalendar(currentYear, currentMonth);
});
// Function to generate the calendar for a specific month and year

function generateCalendar(year, month) 
{
    const calendarElement = document.getElementById('calendar');
    const currentMonthElement = document.getElementById('currentMonth');
    const event = document.getElementById('event');

    // Create a date object for the first day of the specified month
    const firstDayOfMonth = new Date(year, month, 1);
    const daysInMonth = new Date(year, month + 1, 0).getDate();

    // Clear the calendar
    calendarElement.innerHTML = '';

    // Set the current month text
    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    currentMonthElement.innerText = `${monthNames[month]} ${year}`;
    selectedmonth.value = month;
    selectedyear.value = year;
    // Calculate the day of the week for the first day of the month (0 - Sunday, 1 - Monday, ..., 6 - Saturday)
    const firstDayOfWeek = firstDayOfMonth.getDay();

    // Create headers for the days of the week
    const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    daysOfWeek.forEach(day => {
        const dayElement = document.createElement('div');
        dayElement.className = 'text-center font-semibold';
        dayElement.innerText = day;
        calendarElement.appendChild(dayElement);
    });

    // Create empty boxes for days before the first day of the month
    for (let i = 0; i < firstDayOfWeek; i++) {
        const emptyDayElement = document.createElement('div');
        calendarElement.appendChild(emptyDayElement);
    }

    // Create boxes for each day of the month
    for (let day = 1; day <= daysInMonth; day++) {
        let dayElement = document.createElement('button');
        dayElement.className = 'text-center py-2 border cursor-pointer text-black bg-white rounded-lg cursor-pointer hover:text-gray-600 hover:bg-gray-100';
        dayElement.type = 'submit';
        dayElement.name = 'day';
        dayElement.innerText = day;

        if (day < 10) {
            dayElement.value = '0' + day;
        } else {
            dayElement.value = day;
        }
        const d = new Date();
        let monthh = d.getMonth();
        let yearr = d.getFullYear();
        let datee = d.getDate();
        //to disable the past date
        if (day < datee && selectedmonth.value==monthh && selectedyear.value==yearr) 
        {
            dayElement.className = 'text-center py-2 border cursor-pointer text-gray-400 bg-gray-300 rounded-lg cursor-pointer'; // Add classes for the indicator
            dayElement.disabled = true;
        }

        //to highlight the selected date
        if (year === selectedyear.value && month === selectedmonth.value && day == selectedday.value) {
            dayElement.className = 'text-center py-2 border cursor-pointer text-white rounded-lg cursor-pointer hover:text-gray-600 hover:bg-gray-100 bg-slate-950'; // Add classes for the indicator
        }

        calendarElement.appendChild(dayElement);
    }
}

//for enabling the reserve button 
function btnEnable() {
    let btnReserve = document.getElementById("btnReserve");
    var time = document.getElementsByName("avTime");
    for (var i = 0; i < time.length; i++) {
        var isChecked = false;
        if (time[i].checked) {
            btnReserve.disabled = false;
            btnReserve.className = 'btn btn-success text-zinc-100';
        }
    }
}
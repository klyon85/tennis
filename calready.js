$(function() { // document ready

		$('#calendar').fullCalendar({
			theme: true,
			now: '2016-05-07',
			editable: true, // enable draggable events
			aspectRatio: 1.8,
			  minTime: "09:00:00",
			  maxTime: "21:00:00",
			scrollTime: '00:00', // undo default 6am scrollTime
			header: {
				left: 'today prev,next',
				center: 'title',
				right: 'timelineDay,timelineThreeDays,agendaWeek,month'
			},
			defaultView: 'timelineDay',
			views: {
				timelineThreeDays: {
					type: 'timeline',
					duration: { days: 3 }
				}
			},
			resourceLabelText: 'Rooms',
			resources: [

				{ id: 'i', title: 'Indoor Courts 1-6', children: [
					{ id: 'i1', title: 'Court 1' },
					{ id: 'i2', title: 'Court 2' },
					{ id: 'i3', title: 'Court 3' },
					{ id: 'i4', title: 'Court 4' },
					{ id: 'i5', title: 'Court 5' },
					{ id: 'i6', title: 'Court 6' },
				] },                                           
				{ id: 'o', title: 'Outdoor Courts 7-18', children: [
					{ id: 'o1', title: 'Court 7' },
					{ id: 'o2', title: 'Court 8' },
					{ id: 'o3', title: 'Court 9' },
					{ id: 'o4', title: 'Court 10' },
					{ id: 'o5', title: 'Court 11' },
					{ id: 'o6', title: 'Court 12' },
					{ id: 'o7', title: 'Court 13' },
					{ id: 'o8', title: 'Court 14' },
					{ id: 'o9', title: 'Court 15' },
					{ id: 'o10', title: 'Court 16' },
					{ id: 'o11', title: 'Court 17' },
					{ id: 'o12', title: 'Court 18' },
				
				]},

			],
			events: [
				{ id: '1', resourceId: 'b', start: '2016-05-07T02:00:00', end: '2016-05-07T07:00:00', title: 'event 1' },
				{ id: '2', resourceId: 'c', start: '2016-05-07T05:00:00', end: '2016-05-07T22:00:00', title: 'event 2' },
				{ id: '3', resourceId: 'd', start: '2016-05-06', end: '2016-05-08', title: 'event 3' },
				{ id: '4', resourceId: 'e', start: '2016-05-07T03:00:00', end: '2016-05-07T08:00:00', title: 'event 4' },
				{ id: '5', resourceId: 'f', start: '2016-05-07T00:30:00', end: '2016-05-07T02:30:00', title: 'event 5' }
			]
		});
	
	});

#http://projecteuler.net/problem=205

import uuid
import random
import time
import urllib, urllib2

def get_mac():
	return '%x' % uuid.getnode()

def play_game():
	peter_score = sum([random.randint(1, 4) for i in range(9)])
	colin_score = sum([random.randint(1, 6) for i in range(6)])
	return peter_score > colin_score

def play_games(games_count):
	start_time = time.time();
	peter_wins_count = colin_wins_count = 0
	for i in range(games_count):
		if play_game():
			peter_wins_count += 1
		else:
			colin_wins_count += 1
	return [int(1000 * (time.time() - start_time)), peter_wins_count, colin_wins_count]

def simulate(uuid, target_task_time):
	games_count = 1000
	profiling = True
	while True:
		result = play_games(games_count)
		if profiling:
			profiling = False
		else:
			send([uuid, games_count] + result)
		games_count = int(games_count * target_task_time / result[0])

def send(result):
	params = urllib.urlencode(dict(zip(['uuid', 'count', 'time', 'peter', 'colin'], result)))
	status = urllib2.urlopen("http://rexxar.ru/dice/commit.php?" + params).read()
	if status == "ok":
		print "Successfully sent", result[1], "rolls"
	else:
		print "Error sending data"

simulate(get_mac(), 5000)

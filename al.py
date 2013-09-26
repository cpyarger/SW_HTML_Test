#!/usr/bin/env python
#
# 
# Refrenced https://github.com/warlockcc/snippets/blob/master/favorite-artists/favorite-artists.py
# in the design of this script. 
#
# Modifications were needed to have this script produce the requested output.	`


from collections import defaultdict
from itertools import combinations


stats = defaultdict(int)

with open('Artist_lists_small.txt', 'r') as f: # opens File for reading
  for line in f:# reads file line by line
    for pair in combinations(line.split(','), 2): #Finds Pairs
      stats[pair] += 1 # counts pairs

# Removes Self Pairs
stats = [(k, v) for k, v in stats.items() if k[0] != k[1]]

#Prints only pairs that show up in list 50 times or higher

for p in sorted(stats, key=lambda x: x[1], reverse=True): 
   if ( p[1] >= 50 ): #parses for stats equal or greater than 50
    print(p[0]) # prints out those pairs that appear in 50 or more lists without number of lists
#    print(p) # prints out those pairs that appear in 50 or more lists with number of lists



